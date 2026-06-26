<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        $patientsCount = DB::table('patients')->count();
        $doctorsCount = DB::table('doctors')->count();
        $appointmentsCount = DB::table('appointments')->count();
        
        $rooms = DB::table('rooms')
            ->select('room_type', DB::raw('count(*) as available_count'))
            ->where('status', 'Available')
            ->groupBy('room_type')
            ->get()
            ->pluck('available_count', 'room_type');

        $recentAppointments = DB::table('appointments')
            ->join('doctors', 'appointments.doctor_id', '=', 'doctors.doctor_id')
            ->select('appointments.*', 'doctors.name as doctor_name', 'doctors.specialization as doctor_specialization')
            ->orderBy('schedule', 'asc')
            ->take(4)
            ->get();

        return view('admin.dashboard', compact(
            'patientsCount', 
            'doctorsCount', 
            'appointmentsCount', 
            'rooms', 
            'recentAppointments'
        ));
    }

    public function doctors()
    {
        $totalDoctors = DB::table('doctors')->count();
        $pendingAppointments = DB::table('appointments')->where('status', 'Pending')->count();
        $departmentsCount = DB::table('doctors')->distinct('department')->count('department');
        $onDutyToday = DB::table('doctors')->where('status', 'On Duty')->count();

        $doctors = DB::table('doctors as d')
            ->select(
                'd.*',
                DB::raw('(SELECT COUNT(DISTINCT patient_id) FROM appointments WHERE doctor_id = d.doctor_id) as patient_count')
            )
            ->get()
            ->map(function ($doc) {
                $doc->clean_name = preg_replace('/^(dr\.|dr)\s+/i', '', $doc->name);
                
                $words = explode(' ', $doc->clean_name);
                $initials = '';
                foreach ($words as $w) {
                    $initials .= strtoupper(substr($w, 0, 1));
                }
                $doc->initials = substr($initials, 0, 2) ?: 'DR';
                
                $doc->status_bg = ($doc->status === 'On Duty') ? '#ecfdf5' : '#fff1f2';
                $doc->status_color = ($doc->status === 'On Duty') ? '#10b981' : '#f43f5e';
                
                return $doc;
            });

        $groupedDoctors = $doctors->groupBy('department');

        return view('admin.doctors', compact(
            'totalDoctors',
            'pendingAppointments',
            'departmentsCount',
            'onDutyToday',
            'groupedDoctors'
        ));
    }

    public function createDoctor()
    {
        return view('admin.doctor_create');
    }

    public function storeDoctor(Request $request)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'department'     => 'required|string|max:255',
            'phone'          => 'required|string|max:20',
            'email'          => 'required|email|max:255|unique:doctors,email',
            'password'       => 'required|string|min:6',
            'status'         => 'nullable|string|in:On Duty,On Leave',
        ]);

        $nextId = DB::table('doctors')->max('doctor_id') + 1;

        DB::table('doctors')->insert([
            'doctor_id'      => $nextId,
            'name'           => $validated['name'],
            'specialization' => $validated['specialization'],
            'department'     => $validated['department'],
            'phone'          => $validated['phone'],
            'email'          => $validated['email'],
            'password'       => bcrypt($validated['password']),
            'status'         => $validated['status'] ?? 'On Duty',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);

        return redirect()->route('admin.doctors')->with('success', 'Doctor added successfully!');
    }

    public function updateDoctorStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:On Duty,On Leave',
        ]);

        DB::table('doctors')->where('doctor_id', $id)->update([
            'status'     => $validated['status'],
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.doctors')->with('success', 'Doctor status updated.');
    }

    public function patients()
    {
        $totalPatients = DB::table('patients')->count();
        $malePatients = DB::table('patients')->where('gender', 'Male')->count();
        $femalePatients = DB::table('patients')->where('gender', 'Female')->count();
        $consultationsCount = DB::table('appointments')->count();

        $patients = DB::table('patients as p')
            ->leftJoin('appointments as a', function($join) {
                $join->on('p.patient_id', '=', 'a.patient_id')
                    ->whereRaw('a.appointment_id = (SELECT MAX(appointment_id) FROM appointments WHERE patient_id = p.patient_id)');
            })
            ->leftJoin('doctors as d', 'a.doctor_id', '=', 'd.doctor_id')
            ->select(
                'p.*',
                'd.name as doctor_name',
                'a.schedule as last_visit',
                DB::raw('(SELECT COUNT(*) FROM med_records WHERE patient_id = p.patient_id) as records_count')
            )
            ->get();

        return view('admin.patients', compact(
            'totalPatients',
            'malePatients',
            'femalePatients',
            'consultationsCount',
            'patients'
        ));
    }

    public function patientProfile($id)
    {
        $patient = DB::table('patients')->where('patient_id', $id)->firstOrFail();

        $appointments = DB::table('appointments as a')
            ->join('doctors as d', 'a.doctor_id', '=', 'd.doctor_id')
            ->select('a.*', 'd.name as doctor_name', 'd.specialization')
            ->where('a.patient_id', $id)
            ->orderBy('a.schedule', 'desc')
            ->get();

        $medRecords = DB::table('med_records as m')
            ->join('doctors as d', 'm.doctor_id', '=', 'd.doctor_id')
            ->select('m.*', 'd.name as doctor_name', 'd.specialization')
            ->where('m.patient_id', $id)
            ->orderBy('m.date', 'desc')
            ->get();

        $prescriptions = DB::table('prescriptions as pr')
            ->join('doctors as d', 'pr.doctor_id', '=', 'd.doctor_id')
            ->select('pr.*', 'd.name as doctor_name')
            ->where('pr.patient_id', $id)
            ->get();

        $totalAppointments = $appointments->count();
        $completedAppointments = $appointments->where('status', 'Completed')->count();
        $pendingAppointments = $appointments->where('status', 'Pending')->count();

        return view('admin.patient_profile', compact(
            'patient',
            'appointments',
            'medRecords',
            'prescriptions',
            'totalAppointments',
            'completedAppointments',
            'pendingAppointments'
        ));
    }

    public function appointments()
    {
        $upcomingAppointments = DB::table('appointments as a')
            ->join('patients as p', 'a.patient_id', '=', 'p.patient_id')
            ->join('doctors as d', 'a.doctor_id', '=', 'd.doctor_id')
            ->select('a.*', 'p.name as patient_name', 'd.name as doctor_name')
            ->where('a.status', 'Pending')
            ->orderBy('a.schedule', 'asc')
            ->get();

        $pastAppointments = DB::table('appointments as a')
            ->join('patients as p', 'a.patient_id', '=', 'p.patient_id')
            ->join('doctors as d', 'a.doctor_id', '=', 'd.doctor_id')
            ->select('a.*', 'p.name as patient_name', 'd.name as doctor_name')
            ->whereIn('a.status', ['Completed', 'Cancelled'])
            ->orderBy('a.schedule', 'desc')
            ->get();

        return view('admin.appointments', compact('upcomingAppointments', 'pastAppointments'));
    }


    public function feedbacks()
    {
        $feedbacks = DB::table('feedbacks as f')
            ->leftJoin('patients as p', 'f.patient_id', '=', 'p.patient_id')
            ->select('f.*', 'p.name as patient_name')
            ->orderBy('f.created_at', 'desc')
            ->get();
        
        return view('admin.feedbacks', compact('feedbacks'));
    }
}
