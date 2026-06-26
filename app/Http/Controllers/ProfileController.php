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

        $patient_id = null;

        if ($authUser->role === 'patient') {
            $patient = \Illuminate\Support\Facades\DB::table('patients')
                ->where('email', $authUser->email)
                ->first();
            if ($patient) {
                $user->phone      = $patient->phone_no ?? '';
                $user->sex        = $patient->gender ?? '';
                $user->birthday   = $patient->dob ?? '';
                $user->address    = $patient->address ?? '';
                $patient_id       = $patient->id;
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
                $user->phone          = $doctor->phone ?? '';
                $user->specialization = $doctor->specialization ?? '';
                $user->department     = $doctor->department ?? '';
            }
        }

        return view('profile.settings', compact('user', 'patient_id'));
    }


    public function update(Request $request)
    {
        $authUser = auth()->user();
        if (!$authUser) {
            return redirect()->route('login');
        }

        $validated = $this->validateByRole($authUser, $request);

        $userUpdate = [
            'name'  => $validated['name'],
            'email' => $validated['email'],
        ];
        if (isset($validated['password'])) {
            $userUpdate['password'] = $validated['password'];
        }

        \Illuminate\Support\Facades\DB::table('users')
            ->where('id', $authUser->id)
            ->update($userUpdate);

        if ($authUser->role === 'patient') {
            $parts     = explode(' ', $validated['name']);
            $lastName  = array_pop($parts);
            $firstName = implode(' ', $parts) ?: $validated['name'];

            \Illuminate\Support\Facades\DB::table('patients')
                ->where('email', $authUser->email)
                ->update([
                    'name'               => $validated['name'],
                    'email'              => $validated['email'],
                    'phone_no'           => $validated['phone'] ?? null,
                    'gender'             => $validated['sex'] ?? null,
                    'dob'                => $validated['birthday'] ?? null,
                    'blood_type'         => $validated['blood_type'] ?? null,
                    'allergies'          => $validated['allergies'] ?? null,
                    'medical_conditions' => $validated['medical_conditions'] ?? null,
                    'first_name'         => $firstName,
                    'last_name'          => $lastName,
                    'date_of_birth'      => $validated['birthday'] ?? null,
                    'sex'                => $validated['sex'] ?? null,
                    'phone_number'       => $validated['phone'] ?? null,
                    'age'                => $validated['age'] ?? null,
                ]);
        } elseif ($authUser->role === 'doctor') {
            \Illuminate\Support\Facades\DB::table('doctors')
                ->where('email', $authUser->email)
                ->update([
                    'name'           => $validated['name'],
                    'email'          => $validated['email'],
                    'phone'          => $validated['phone'] ?? null,
                    'specialization' => $validated['specialization'] ?? null,
                    'license_number' => $validated['license_number'] ?? null,
                    'availability'   => $validated['availability'] ?? null,
                ]);
        }

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }


    private function validateByRole($user, Request $request)
    {
        $rules = [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'phone'    => 'nullable|string|max:20',
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
                'availability'   => 'nullable|string',
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