<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('patient/{patient}')->group(function(){
    Route::get('/dashboard', [PatientController::class, 'dashboard'])->name('patient.dashboard');
    
    Route::get('/booked-slot', [PatientController::class, 'bookedSlot'])->name('patient.bookedSlot');
    Route::get('/set-appointment', [PatientController::class, 'appointment'])->name('patient.appointment');
    Route::post('/set-appointment', [PatientController::class, 'storeAppoint'])->name('patient.set');

    Route::get('/records', [PatientController::class, 'records'])->name('patient.records');
    Route::get('/search', [PatientController::class, 'searchRecord'])->name('searchRecord');

    Route::get('/prescriptions', [PatientController::class, 'prescriptions'])->name('patient.prescriptions');
});


Route::fallback([PatientController::class, 'fallbackPage']);