<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;

Route::prefix('doctor')->group(function () {
    Route::get('/dashboard', [DoctorController::class, 'dashboard'])->name('doctor.dashboard');
    Route::get('/patients', [DoctorController::class, 'patients'])->name('doctor.patients');
    Route::get('/consultation', [DoctorController::class, 'consultation'])->name('doctor.consultation');
    Route::get('/directory', [DoctorController::class, 'patientDirectory']);
});
