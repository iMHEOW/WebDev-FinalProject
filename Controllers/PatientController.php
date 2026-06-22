<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controller;


class PatientController extends Controller{

    public function dashboard($patient_id){
        $patientName = DB::table('patient')
                    ->where('patient_id', $patient_id)
                    ->value('name');

        $dboardUp = DB::table('appointment')
                    ->leftJoin('doctor', 'appointment.doctor_id', '=', 'doctor.doctor_id')
                    ->leftJoin('visit_type', 'appointment.visit_type', '=', 'visit_type.visit_type')
                    ->select(DB::raw('DATE(appointment.schedule) as Date'),
                             DB::raw("DATE_FORMAT(appointment.schedule, '%H:%i') as Time"),
                             'doctor.name as Doctor',
                             'doctor.department as Department',
                             'appointment.status as Status')
                    ->where('appointment.patient_id', $patient_id)
                    ->where('schedule', '>=', now())
                    ->orderBy('appointment.schedule','asc')
                    ->get();

        $dboardPast = DB::table('appointment')
                    ->leftJoin('doctor', 'appointment.doctor_id', '=', 'doctor.doctor_id')
                    ->leftJoin('visit_type', 'appointment.visit_type', '=', 'visit_type.visit_type')
                    ->select(DB::raw('DATE(appointment.schedule) as Date'),
                             DB::raw("DATE_FORMAT(appointment.schedule, '%H:%i') as Time"),
                             'doctor.name as Doctor',
                             'doctor.department as Department')
                    ->where('appointment.patient_id', $patient_id)
                    ->whereBetween('schedule', [now()->subMonth(), now()])
                    ->orderBy('appointment.schedule','desc')
                    ->get();

        $upcomingApp = DB::table('appointment')
                    ->select('appointment_id')
                    ->where('patient_id', $patient_id)
                    ->where('schedule', '>=', now())
                    ->count();

        $activePre = DB::table('prescription')
                    ->select('appointment_id')
                    ->where('patient_id', $patient_id)
                    ->where('refills_left', '!=', '0')
                    ->count();

        $monthRecord = DB::table('med_record')
                    ->where('patient_id', $patient_id)
                    ->whereBetween('date', [now()->startOfMonth(), now()])
                    ->count();

        return view('patient.dashboard', compact('patientName', 'dboardUp', 'dboardPast', 'upcomingApp', 'activePre', 'monthRecord', 'patient_id')); 
    }



    public function appointment($patient_id){
        $patientName = DB::table('patient')
        ->where('patient_id', $patient_id)
        ->value('name');

        $doctors = DB::table('doctor')
                    ->orderBy('department','asc')
                    ->get();

        return view('patient.appointment', compact('patientName', 'doctors', 'patient_id'));
    }


    public function storeAppoint(Request $request, $patient_id){
        $request->validate([
            'doctor_id' => ['required', 'exists:doctor,doctor_id'],
            'visit_type' => ['required', 'in:In Person,Teleconsult'],
            'appointment_date' => ['required', 'date', 'after_or_equal:today'],
            'appointment_time' => ['required'],
            'symptom' => ['required', 'string', 'max:1000'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $dateTime = new \DateTime($request->appointment_date . ' ' . $request->appointment_time);
        $combinedDateTime = $dateTime->format('Y-m-d H:i:s');

        //Schedule Conflict
        $conflict = DB::table('appointment')
                ->where('doctor_id', $request->doctor_id)
                ->where('schedule', $combinedDateTime)
                ->exists();
        if ($conflict) {
            return back()
                ->withInput()
                ->withErrors(['appointment_time' => 'This timeslot is already booked. Please choose another slot.']);
        }

        DB::table('appointment')->insert([
            'patient_id' => $patient_id, 
            'doctor_id' => $request->doctor_id,
            'visit_type' => $request->visit_type,
            'schedule' => $combinedDateTime, 
            'symptoms' => $request->symptom,
            'addnotes' => $request->notes,
            'status' => 'Pending'
        ]);

        return redirect()->route('patient.dashboard', ['patient'=>$patient_id])->with('success', 'Appointment set successfully!');
    }


    public function bookedSlot(Request $request, $patient_id){
        $doctorId = $request->doctor_id;
        $date = $request->date;

        if (!$doctorId || !$date){
            return response()->json([]);
        }

        $bookedDatetimes = DB::table('appointment')
            ->where('doctor_id', $doctorId)
            ->whereDate('schedule', $date) 
            ->pluck('schedule');
        $bookedTimes = [];
        
        foreach ($bookedDatetimes as $datetime) {
            $dt = new \DateTime($datetime);
            $bookedTimes[] = $dt->format('H:i:s'); 
        }

        return response()->json($bookedTimes);
    }



    public function records($patient_id){
        $patientName = DB::table('patient')
                    ->where('patient_id', $patient_id)
                    ->value('name');

        $monthRecord = DB::table('med_record')
                    ->where('patient_id', $patient_id)
                    ->whereBetween('date', [now()->startOfMonth(), now()])
                    ->count();

        $totalRecord = DB::table('med_record')
                    ->where('patient_id', $patient_id)
                    ->count('record_id');

        $medrecord = DB::table('med_record')
                    ->leftJoin('patient', 'med_record.patient_id', '=', 'patient.patient_id')
                    ->leftJoin('doctor', 'med_record.doctor_id', '=', 'doctor.doctor_id')
                    ->select('med_record.date as Date', 
                             'med_record.type as Type', 
                             'doctor.name as Doctor',
                             'med_record.summary as Summary')
                    ->where('med_record.patient_id', $patient_id)
                    ->orderBy('med_record.date','desc')
                    ->get();
        return view('patient.records', compact('patientName', 'monthRecord', 'totalRecord', 'medrecord', 'patient_id'));
    }

    
    public function searchRecord(Request $request, $patient_id){
        $patientName = DB::table('patient')
                    ->where('patient_id', $patient_id)
                    ->value('name');

        $monthRecord = DB::table('med_record')
                    ->where('patient_id', $patient_id)
                    ->whereBetween('date', [now()->startOfMonth(), now()])
                    ->count();

        $totalRecord = DB::table('med_record')
                    ->where('patient_id', $patient_id)
                    ->count('record_id');

        $medrecord = DB::table('med_record')
                    ->leftJoin('patient', 'med_record.patient_id', '=', 'patient.patient_id')
                    ->leftJoin('doctor', 'med_record.doctor_id', '=', 'doctor.doctor_id')
                    ->select('med_record.date as Date', 
                            'med_record.type as Type', 
                            'doctor.name as Doctor',
                            'med_record.summary as Summary')
                    ->where('med_record.patient_id', $patient_id)
                    ->where(function($query) use ($request){
                        $query->where('med_record.date', 'like', "%{$request->param}%")   
                            ->orwhere('med_record.type', 'like', "%{$request->param}%")
                            ->orwhere('doctor.name', 'like', "%{$request->param}%")
                            ->orwhere('med_record.summary', 'like', "%{$request->param}%");
                    })
                    ->get();
        return view('patient.records', compact('patientName', 'monthRecord', 'totalRecord', 'medrecord', 'patient_id'));
    }



    public function prescriptions($patient_id){
        $patientName = DB::table('patient')
                    ->where('patient_id', $patient_id)
                    ->value('name');

        $activeP = DB::table('prescription')
                ->select('appointment_id')
                ->where('patient_id', $patient_id)
                ->where('refills_left', '!=', '0')
                ->count();

        $pastP = DB::table('prescription')
                ->select('appointment_id')
                ->where('patient_id', $patient_id)
                ->where('refills_left', '=', '0')
                ->count();

        $activePresc = DB::table('prescription')
                    ->leftJoin('patient', 'prescription.patient_id', '=', 'patient.patient_id')
                    ->where('prescription.patient_id', $patient_id)
                    ->where('prescription.refills_left', '!=', '0')
                    ->select('prescription.medication as Medication', 
                            'prescription.dosage as Dosage', 
                            'prescription.quantity as Qty',
                            'prescription.instruction as Instruction',
                            'prescription.refills_left as Refills Left')
                    ->get();

        $pastPresc = DB::table('prescription')
                    ->leftJoin('patient', 'prescription.patient_id', '=', 'patient.patient_id')
                    ->where('prescription.patient_id', $patient_id)
                    ->where('prescription.refills_left', '=', '0')
                    ->select('prescription.medication as Medication', 
                            'prescription.dosage as Dosage', 
                            'prescription.quantity as Qty',
                            'prescription.start_date as Start Date',
                            'prescription.end_date as End Date')
                    ->get();

        return view('patient.prescriptions', compact('patientName', 'activeP', 'pastP', 'activePresc', 'pastPresc', 'patient_id'));
    }



    public function fallbackPage(){
        return "404 PAGE NOT ROUND";
    }

}