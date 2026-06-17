<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DoctorController extends Controller
{
    public function dashboard()
    {
        return view('doctor.dashboard');
    }

    public function patients()
    {
        return view('doctor.patients');
    }

    public function consultation()
    {
        return view('doctor.consultation');
    }
}