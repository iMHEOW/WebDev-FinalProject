<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
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

    public function doctors(){
        $totalDoctors = DB::table('doctors')->count();
        $pendingAppointments = DB::table('appointments')->where('status', 'Pending')->count();
        $departmentsCount = DB::table('doctors')->distinct('department')->count('department');
        
        
        $onDutyToday = DB::table('doctors')->where('status', 'On Duty')->count();

        $doctors = DB::table('doctors as d')
            ->select(
                'd.*',
                DB::raw('(SELECT COUNT(DISTINCT patient_id) FROM appointments WHERE doctor_id = d.doctor_id) as patient_count')
            )
            ->get();

        $groupedDoctors = $doctors->groupBy('department');

        return view('admin.doctors', compact(
            'totalDoctors',
            'pendingAppointments',
            'departmentsCount',
            'onDutyToday',
            'groupedDoctors'
        ));
    }
    public function patients(){
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
    public function appointments(){
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

    public function tickets(){
        $conflicts = DB::table('appointments as a')
            ->join('doctors as d', 'a.doctor_id', '=', 'd.doctor_id')
            ->select('a.doctor_id', 'a.schedule', 'd.name as doctor_name', 'd.department')
            ->groupBy('a.doctor_id', 'a.schedule', 'd.name', 'd.department')
            ->havingRaw('COUNT(a.appointment_id) > 1')
            ->get();

        $ticketReports = [];
        foreach ($conflicts as $index => $conflict) {
            $bookings = DB::table('appointments as a')
                ->join('patients as p', 'a.patient_id', '=', 'p.patient_id')
                ->select('p.name as patient_name', 'a.visit_type')
                ->where('a.doctor_id', $conflict->doctor_id)
                ->where('a.schedule', $conflict->schedule)
                ->get();

            $ticketReports[] = [
                'ticket_id' => 'TC-' . (100 + $index + 1),
                'doctor_name' => $conflict->doctor_name,
                'department' => $conflict->department,
                'schedule' => $conflict->schedule,
                'bookings' => $bookings
            ];
        }

        return view('admin.tickets', compact('ticketReports'));
    }
}
