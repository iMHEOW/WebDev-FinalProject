<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controller;

class PatientController extends Controller
{
    public function dashboard(){
        $dboard = DB::table('appointment')
                    ->leftJoin('doctor', 'appointment.doctor_id', '=', 'doctor.doctor_id')
                    ->leftJoin('visit_type', 'appointment.visit_type', '=', 'visit_type.visit_type')
                    ->select('appointment.appointment_id as ID', 
                             'appointment.schedule as Schedule', 
                             'doctor.name as Doctor',
                             'doctor.department as Department',
                             'appointment.status as Status')
                    ->get();

        return view('patient.dashboard', compact('dboard')); 

    }


    public function appointment(){
        return view('patient.appointment');
    }

    public function storeAppoint(){
        return view('patient.appointment');
    }


    public function records(){
        $medrecord = DB::table('med_record')
                    ->leftJoin('patient', 'med_record.patient_id', '=', 'patient.patient_id')
                    ->leftJoin('doctor', 'med_record.doctor_id', '=', 'doctor.doctor_id')
                    ->select('med_record.date as Date', 
                             'med_record.type as Type', 
                             'doctor.name as Doctor',
                             'med_record.summary as Summary')
                    ->get();
        return view('patient.records', compact('medrecord'));
    }

    public function searchRecord(Request $request){
        $medrecord = DB::table('med_record')
                    ->leftJoin('patient', 'med_record.patient_id', '=', 'patient.patient_id')
                    ->leftJoin('doctor', 'med_record.doctor_id', '=', 'doctor.doctor_id')
                    ->select('med_record.date as Date', 
                            'med_record.type as Type', 
                            'doctor.name as Doctor',
                            'med_record.summary as Summary')
                    ->where('med_record.date', 'like', "%{$request->param}%")   
                    ->orwhere('med_record.type', 'like', "%{$request->param}%")
                    ->orwhere('doctor.name', 'like', "%{$request->param}%")
                    ->orwhere('med_record.summary', 'like', "%{$request->param}%")
                    ->get();
        return view('patient.records', compact('medrecord'));
    }

    public function prescriptions(){
        return view('patient.prescriptions');
    }

    public function fallbackPage(){
        return "404 PAGE NOT ROUND";
    }

}