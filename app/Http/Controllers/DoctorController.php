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

    public function patients()
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

        $validated['name'] = $validated['first_name'] . ' ' . $validated['last_name'];
        $validated['gender'] = $validated['sex'];
        $validated['dob'] = $validated['date_of_birth'];
        $validated['phone_no'] = $validated['phone_number'];

        $user = \App\Models\User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt('password123'),
            'role' => 'patient',
            'email_verified_at' => now(),
        ]);

        $validated['patient_id'] = $user->id;

        Patient::create($validated); 

        return redirect('/doctor/directory')->with('success', 'New patient record successfully created!');
    }

    public function showProfile($id)
    {
        $patient = Patient::findOrFail($id);
        
        $appointments = DB::select("
            SELECT 
                appointment_id,
                patient_id,
                doctor_id,
                visit_type,
                symptoms,
                addnotes,
                status,
                DATE(schedule) as appointment_date,
                DATE_FORMAT(schedule, '%H:%i') as appointment_time
            FROM appointments 
            WHERE patient_id = ? 
            ORDER BY schedule ASC
        ", [$patient->patient_id]);

        return view('doctor.patients', compact('patient', 'appointments'));
    }
}