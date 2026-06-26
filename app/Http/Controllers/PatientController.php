<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controller;

class PatientController extends Controller
{
    public function dashboard($patient_id)
    {
        $patientName = DB::table('patients')
            ->where('patient_id', $patient_id)
            ->value('name');

        $dboardUp = DB::table('appointments')
            ->leftJoin('doctors', 'appointments.doctor_id', '=', 'doctors.doctor_id')
            ->select('appointments.appointment_id as id',
                     DB::raw('DATE(appointments.schedule) as date'),
                     DB::raw("TO_CHAR(appointments.schedule::timestamp, 'HH24:MI') as time"),
                     'appointments.visit_type as modality',
                     'doctors.name as doctor',
                     'doctors.department as department',
                     'appointments.status as status')
            ->where('appointments.patient_id', $patient_id)
            ->where('appointments.status', '!=', 'Cancelled')
            ->where('appointments.schedule', '>=', now())
            ->orderBy('appointments.schedule', 'asc')
            ->get();

        $dboardPast = DB::table('appointments')
            ->leftJoin('doctors', 'appointments.doctor_id', '=', 'doctors.doctor_id')
            ->select(DB::raw('DATE(appointments.schedule) as date'),
                     DB::raw("TO_CHAR(appointments.schedule::timestamp, 'HH24:MI') as time"),
                     'doctors.name as doctor',
                     'doctors.department as department')
            ->where('appointments.status', '!=', 'Cancelled')
            ->where('appointments.patient_id', $patient_id)
            ->whereBetween('appointments.schedule', [now()->subMonth(), now()])
            ->orderBy('appointments.schedule', 'desc')
            ->get();

        $upcomingApp = DB::table('appointments')
            ->where('patient_id', $patient_id)
            ->where('status', '!=', 'Cancelled')
            ->where('schedule', '>=', now())
            ->count();

        $activePre = DB::table('prescriptions')
            ->where('patient_id', $patient_id)
            ->where('refills_left', '!=', '0')
            ->count();

        $monthRecord = DB::table('med_records')
            ->where('patient_id', $patient_id)
            ->whereBetween('date', [now()->startOfMonth(), now()])
            ->count();

        return view('patient.dashboard', compact('patientName', 'dboardUp', 'dboardPast', 'upcomingApp', 'activePre', 'monthRecord', 'patient_id'));
    }

    public function cancelAppointment(Request $request, $patient_id)
    {
        DB::table('appointments')
            ->where('appointment_id', $request->appointment_id)
            ->where('patient_id', $patient_id)
            ->update(['status' => 'Cancelled']);

        return redirect()->back()->with('success', 'Your appointment has been cancelled.');
    }

    public function appointment($patient_id)
    {
        $patientName = DB::table('patients')
            ->where('patient_id', $patient_id)
            ->value('name');

        $doctors = DB::table('doctors')
            ->orderBy('department', 'asc')
            ->get();

        return view('patient.appointment', compact('patientName', 'doctors', 'patient_id'));
    }

    public function storeAppoint(Request $request, $patient_id)
    {
        $request->validate([
            'doctor_id' => ['required', 'exists:doctors,doctor_id'],
            'visit_type' => ['required', 'in:In Person,Teleconsult'],
            'appointment_date' => ['required', 'date', 'after_or_equal:today'],
            'appointment_time' => ['required'],
            'symptom' => ['required', 'string', 'max:1000'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $dateTime = new \DateTime($request->appointment_date . ' ' . $request->appointment_time);
        $combinedDateTime = $dateTime->format('Y-m-d H:i:s');

        $conflict = DB::table('appointments')
            ->where('doctor_id', $request->doctor_id)
            ->where('schedule', $combinedDateTime)
            ->where('status', '!=', 'Cancelled')
            ->exists();
            
        if ($conflict) {
            return back()->withInput()->withErrors(['appointment_time' => 'Timeslot already booked.']);
        }

        DB::table('appointments')->insert([
            'patient_id' => $patient_id,
            'doctor_id' => $request->doctor_id,
            'visit_type' => $request->visit_type,
            'schedule' => $combinedDateTime,
            'symptoms' => $request->symptom,
            'addnotes' => $request->notes,
            'status' => 'Pending'
        ]);

        return redirect()->route('patient.dashboard', ['patient' => $patient_id])->with('success', 'Appointment set successfully!');
    }

    public function bookedSlot(Request $request, $patient_id)
    {
        $doctorId = $request->doctor_id;
        $date = $request->date;

        if (!$doctorId || !$date) {
            return response()->json([]);
        }

        $bookedDatetimes = DB::table('appointments')
            ->where('doctor_id', $doctorId)
            ->whereDate('schedule', $date)
            ->where('status', '!=', 'Cancelled')
            ->pluck('schedule');

        $bookedTimes = [];
        foreach ($bookedDatetimes as $datetime) {
            $dt = new \DateTime($datetime);
            $bookedTimes[] = $dt->format('H:i:s');
        }

        return response()->json($bookedTimes);
    }

    public function records($patient_id)
    {
        $patientName = DB::table('patients')->where('patient_id', $patient_id)->value('name');

        $monthRecord = DB::table('med_records')
            ->where('patient_id', $patient_id)
            ->whereBetween('date', [now()->startOfMonth(), now()])
            ->count();

        $totalRecord = DB::table('med_records')
            ->where('patient_id', $patient_id)
            ->count('record_id');

        $medrecord = DB::table('med_records')
            ->leftJoin('patients', 'med_records.patient_id', '=', 'patients.patient_id')
            ->leftJoin('doctors', 'med_records.doctor_id', '=', 'doctors.doctor_id')
            ->select('med_records.date as date', 'med_records.type as type', 'doctors.name as doctor', 'med_records.summary as summary')
            ->where('med_records.patient_id', $patient_id)
            ->orderBy('med_records.date', 'desc')
            ->get();
            
        return view('patient.records', compact('patientName', 'monthRecord', 'totalRecord', 'medrecord', 'patient_id'));
    }

    public function searchRecord(Request $request, $patient_id)
    {
        $patientName = DB::table('patients')->where('patient_id', $patient_id)->value('name');

        $medrecord = DB::table('med_records')
            ->leftJoin('patients', 'med_records.patient_id', '=', 'patients.patient_id')
            ->leftJoin('doctors', 'med_records.doctor_id', '=', 'doctors.doctor_id')
            ->select('med_records.date as date', 'med_records.type as type', 'doctors.name as doctor', 'med_records.summary as summary')
            ->where('med_records.patient_id', $patient_id)
            ->where(function ($query) use ($request) {
                $param = "%{request->param}%";
                $query->whereRaw('med_records.date::text ILIKE ?', [$param])
                      ->orWhere('med_records.type', 'ILIKE', $param)
                      ->orWhere('doctors.name', 'ILIKE', $param)
                      ->orWhere('med_records.summary', 'ILIKE', $param);
            })
            ->get();
            
        return view('patient.records', compact('patientName', 'medrecord', 'patient_id'));
    }

    public function prescriptions($patient_id)
    {
        $patientName = DB::table('patients')->where('patient_id', $patient_id)->value('name');

        $activeP = DB::table('prescriptions')->where('patient_id', $patient_id)->where('refills_left', '!=', '0')->count();
        $pastP = DB::table('prescriptions')->where('patient_id', $patient_id)->where('refills_left', '=', '0')->count();

        $activePresc = DB::table('prescriptions')
            ->leftJoin('patients', 'prescriptions.patient_id', '=', 'patients.patient_id')
            ->where('prescriptions.patient_id', $patient_id)
            ->where('prescriptions.refills_left', '!=', '0')
            ->select('prescription_id as id', 'medication as medication', 'dosage as dosage', 'quantity as qty', 'instruction as instruction', 'refills_left as refills_Left')
            ->get();

        $pastPresc = DB::table('prescriptions')
            ->leftJoin('patients', 'prescriptions.patient_id', '=', 'patients.patient_id')
            ->where('prescriptions.patient_id', $patient_id)
            ->where('prescriptions.refills_left', '=', '0')
            ->select('medication as medication', 'dosage as dosage', 'quantity as qty', 'start_date as start_Date', 'end_date as end_Date')
            ->get();

        return view('patient.prescriptions', compact('patientName', 'activeP', 'pastP', 'activePresc', 'pastPresc', 'patient_id'));
    }

    public function requestRefill(Request $request, $patient_id)
    {
        $prescriptionId = $request->prescription_id;
        $medicationN = $request->medication;

        $doctorName = DB::table('prescriptions')
            ->where('prescriptions.prescription_id', $prescriptionId)
            ->join('doctors', 'prescriptions.doctor_id', '=', 'doctors.doctor_id')
            ->value('doctors.name');

        DB::table('refill_requests')->insert([
            'request_date' => now(),
            'prescription_id' => $prescriptionId,
            'patient_id' => $patient_id,
            'status' => 'Pending'
        ]);

        return redirect()->back()->with('success', "Refill request for {$medicationN} has been sent to Dr. {$doctorName}");
    }

    public function fallbackPage() { return "404 PAGE NOT FOUND"; }
}
