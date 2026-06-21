<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

public function show()
{
    
    $user = (object) [
        'name'               => 'Juan dela Cruz',
        'email'              => 'juan@example.com',
        'phone'              => '09171234567',
        'role'               => 'patient',
        'blood_type'         => 'O+',
        'allergies'          => '',
        'medical_conditions' => '',
        'specialization'     => '',
        'license_number'     => '',
        'availability'       => '',
    ];
    
    // uncomment the code below if you want to test the doctor view

    /*
    $user = (object) [
        'name'               => 'Juan dela Cruz',
        'email'              => 'juan@example.com',
        'phone'              => '09171234567',
        'role'               => 'doctor',
        // doctor fields
        'specialization'     => 'Cardiology',
        'license_number'     => '0012345',
        'availability'       => 'Monday-Friday 9AM-5PM',
        // patient fields (unused but kept to avoid errors)
        'blood_type'         => '',
        'allergies'          => '',
        'medical_conditions' => '',
    ];
    */

    return view('profile.settings', compact('user'));
}

    /**
     * Update the user's profile
     */
    public function update(Request $request)
    {
        // Temporary: disabled while working on UI
        return redirect()->back();
    }

    /**
     * Validate data based on user role
     */
    private function validateByRole($user, Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
        ];

        if ($user->role === 'patient') {
            $rules = array_merge($rules, [
                'allergies' => 'nullable|string',
                'medical_conditions' => 'nullable|string',
                'blood_type' => 'nullable|string',
            ]);
        } elseif ($user->role === 'doctor') {
            $rules = array_merge($rules, [
                'specialization' => 'nullable|string',
                'license_number' => 'nullable|string',
                'availability' => 'nullable|string',
            ]);
        }

        $validated = $request->validate($rules);

        // Hash password if provided, otherwise remove it from validated data
        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        return $validated;
    }
}
