<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/patients', [AdminController::class, 'patients'])->name('admin.patients');
    Route::get('/patients/{id}', [AdminController::class, 'patientProfile'])->name('admin.patient.profile');
    
    Route::get('/doctors', [AdminController::class, 'doctors'])->name('admin.doctors');
    Route::get('/doctors/create', [AdminController::class, 'createDoctor'])->name('admin.doctor.create');
    Route::post('/doctors', [AdminController::class, 'storeDoctor'])->name('admin.doctor.store');
    Route::patch('/doctors/{id}/status', [AdminController::class, 'updateDoctorStatus'])->name('admin.doctor.updateStatus');
    
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


Route::fallback([PatientController::class, 'fallbackPage']);
