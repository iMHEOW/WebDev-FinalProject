<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProfileController extends Controller
{

    public function show()
    {
        
        $authUser = auth()->user();

        if (!$authUser) {
            return redirect()->route('login');
        }

        
        $user = (object) [
            'name'               => $authUser->name,
            'email'              => $authUser->email,
            'phone'              => '',
            'role'               => $authUser->role,
            'blood_type'         => '',
            'allergies'          => '',
            'medical_conditions' => '',
            'birthday'           => '',
            'age'                => '',
            'sex'                => '',
            'specialization'     => '',
            'license_number'     => '',
            'availability'       => '',
            'address'            => '',
        ];

        if ($authUser->role === 'patient') {
            $patient = \Illuminate\Support\Facades\DB::table('patients')
                ->where('email', $authUser->email)
                ->first();
            if ($patient) {
                $user->phone = $patient->phone_no ?? '';
                $user->sex = $patient->gender ?? '';
                $user->birthday = $patient->dob ?? '';
                $user->address = $patient->address ?? '';
                if ($patient->dob) {
                    try {
                        $user->age = \Carbon\Carbon::parse($patient->dob)->age;
                    } catch (\Exception $e) {
                        $user->age = '';
                    }
                }
            }
        } elseif ($authUser->role === 'doctor') {
            $doctor = \Illuminate\Support\Facades\DB::table('doctors')
                ->where('email', $authUser->email)
                ->first();
            if ($doctor) {
                $user->phone = $doctor->phone ?? '';
                $user->specialization = $doctor->specialization ?? '';
                $user->department = $doctor->department ?? '';
            }
        }

        return view('profile.settings', compact('user'));
    }

    


    public function update(Request $request)
    {
        
        return redirect()->back();
    }

    


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
                'blood_type'         => 'nullable|string',
                'allergies'          => 'nullable|string',
                'medical_conditions' => 'nullable|string',
                'birthday'           => 'nullable|date',
                'age'                => 'nullable|integer|min:0|max:150',
                'sex'                => 'nullable|string|in:Male,Female,Other',
            ]);
        } elseif ($user->role === 'doctor') {
            $rules = array_merge($rules, [
                'specialization' => 'nullable|string',
                'license_number' => 'nullable|string',
                'availability' => 'nullable|string',
            ]);
        }

        $validated = $request->validate($rules);

        
        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        return $validated;
    }
}
