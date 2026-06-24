<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Routing\Controller;
use Carbon\Carbon;

class DoctorController extends Controller
{
    public function dashboard()
    {
        $appointments = DB::select("SELECT * FROM appointments");
        
        return view('doctor.dashboard', [
            'appointments' => $appointments
        ]);
    }

    public function patient()
    {
        return view('doctor.patients');
    }

    public function consultation()
    {
        return view('doctor.consultation');
    }

    public function patientDirectory() 
    {
        $patient = Patient::all(); 

        return view('doctor.directory', compact('patient'));
    }

    public function storeConsultation(Request $request) 
    {
        $validated = $request->validate([
            'first_name'        => 'required|string|max:255',
            'last_name'         => 'required|string|max:255',
            'date_of_birth'     => 'required|date',
            'age'               => 'required|integer|min:0',
            'sex'               => 'required|string',
            'email'             => 'required|email|max:255',
            'phone_number'      => 'required|string|max:50',
            'consultation_date' => 'required|date',
            'consultation_time' => 'required',
            'symptoms'          => 'required|string',
            'diagnosis'         => 'required|string',
            'prescription'      => 'nullable|string',
        ]);

        Patient::create($validated); 

        return redirect('/doctor/directory')->with('success', 'New patient record successfully created!');
    }

    public function showProfile($id)
    {
        $patient = Patient::findOrFail($id);
        
        $appointments = DB::select("
            SELECT * FROM appointment 
            WHERE patient_id = ? 
            ORDER BY appointment_date ASC, appointment_time ASC
        ", [$patient->id]);

        return view('doctor.patients', compact('patient', 'appointments'));
    }
}