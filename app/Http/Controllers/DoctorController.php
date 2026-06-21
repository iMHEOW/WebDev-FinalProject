<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class DoctorController extends Controller
{
    public function dashboard()
    {
       
        $appointments = DB::select("SELECT * FROM appointments");

        
        return view('doctor.dashboard', [
            'appointments' => $appointments
        ]);
    }

    public function patientDirectory()
    {
        
        $patients = DB::select("SELECT * FROM users");

        return view('doctor.patientDirectory', [
            'patients' => $patients
        ]);
    }

    public function consultation()
    {
        return view('doctor.consultation');
    }
}