<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;

Route::group(['prefix' => '/'], function() {

    Route::get('/', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/register/email/verify', [AuthController::class, 'showVerifyEmail'])->name('verification.notice');
    Route::get('/register/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])->middleware(['signed'])->name('verification.verify');
    Route::post('/register/email/resend', [AuthController::class, 'resendVerification'])->middleware(['throttle:6,1'])->name('verification.send');
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');

    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/patients', [AdminController::class, 'patients'])->name('admin.patients');
    Route::get('/patients/{id}', [AdminController::class, 'patientProfile'])->name('admin.patient.profile');
    
    Route::get('/doctors', [AdminController::class, 'doctors'])->name('admin.doctors');
    Route::get('/doctors/create', [AdminController::class, 'createDoctor'])->name('admin.doctor.create');
    Route::post('/doctors', [AdminController::class, 'storeDoctor'])->name('admin.doctor.store');
    Route::post('/doctors/{id}/status', [AdminController::class, 'updateDoctorStatus'])->name('admin.doctor.updateStatus');
    
    Route::get('/appointments', [AdminController::class, 'appointments'])->name('admin.appointments');
    
    Route::get('/tickets', [AdminController::class, 'tickets'])->name('admin.tickets');
    Route::post('/tickets/reschedule', [AdminController::class, 'rescheduleAppointments'])->name('admin.ticket.reschedule');
    Route::post('/tickets/reassign', [AdminController::class, 'reassignAppointments'])->name('admin.ticket.reassign');
});

Route::prefix('patient/{patient}')->group(function(){
    Route::get('/dashboard', [PatientController::class, 'dashboard'])->name('patient.dashboard');
    Route::post('/cancel-appointment', [PatientController::class, 'cancelAppointment'])->name('patient.cancelAppointment');
    
    Route::get('/booked-slot', [PatientController::class, 'bookedSlot'])->name('patient.bookedSlot');
    Route::get('/set-appointment', [PatientController::class, 'appointment'])->name('patient.appointment');
    Route::post('/set-appointment', [PatientController::class, 'storeAppoint'])->name('patient.set');

    Route::get('/records', [PatientController::class, 'records'])->name('patient.records');
    Route::get('/search', [PatientController::class, 'searchRecord'])->name('searchRecord');

    Route::get('/prescriptions', [PatientController::class, 'prescriptions'])->name('patient.prescriptions');
    Route::post('/request-refill', [PatientController::class, 'requestRefill'])->name('patient.requestRefill');
});

Route::prefix('doctor')->group(function () {
    Route::get('/dashboard', [DoctorController::class, 'dashboard'])->name('doctor.dashboard');
    Route::get('/patients', [DoctorController::class, 'patients'])->name('doctor.patients');
    Route::get('/consultation', [DoctorController::class, 'consultation'])->name('doctor.consultation');
    Route::post('/consultation/store', [DoctorController::class, 'storeConsultation'])->name('consultation.store');
    
    Route::get('/directory', [DoctorController::class, 'patientDirectory'])->name('doctor.directory');

    Route::get('/patient/{id}', [DoctorController::class, 'showProfile'])->name('doctor.patient.profile');
});

Route::fallback([PatientController::class, 'fallbackPage']);
