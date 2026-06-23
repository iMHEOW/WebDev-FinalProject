<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;

Route::prefix('doctor')->group(function () {
    Route::get('/dashboard', [DoctorController::class, 'dashboard'])->name('doctor.dashboard');
    Route::get('/patients', [DoctorController::class, 'patients'])->name('doctor.patients');
    Route::get('/consultation', [DoctorController::class, 'consultation'])->name('doctor.consultation');
    Route::post('/consultation/store', [DoctorController::class, 'storeConsultation'])->name('consultation.store');
    
    // The main directory list page
    Route::get('/directory', [DoctorController::class, 'patientDirectory'])->name('doctor.directory');

    // Dynamic profile catcher tracking the exact clicked patient card
    Route::get('/patient/{id}', [DoctorController::class, 'showProfile'])->name('doctor.patient.profile');
});