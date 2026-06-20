<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'user'], function() {

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});

Route::group(['prefix' => 'admin'], function() {

   Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

});

Route::prefix('patient')->group(function(){
    Route::get('/dashboard', [PatientController::class, 'dashboard'])->name('patient.dashboard');

    Route::get('/set-appointment', [PatientController::class, 'appointment'])->name('patient.appointment');
    Route::post('/set-appointment', [PatientController::class, 'storeAppoint'])->name('patient.set');

    Route::get('/records', [PatientController::class, 'records'])->name('patient.records');
    Route::get('/search', [PatientController::class, 'searchRecord'])->name('searchRecord');

    Route::get('/prescriptions', [PatientController::class, 'prescriptions'])->name('patient.prescriptions');

});

Route::fallback([PatientController::class, 'fallbackPage']);
