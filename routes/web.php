<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DoctorController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'user'], function() {

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/register/email/verify', [AuthController::class, 'showVerifyEmail'])->name('verification.notice');
    Route::get('/register/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])->middleware(['signed'])->name('verification.verify');
    Route::post('/register/email/resend', [AuthController::class, 'resendVerification'])->middleware(['throttle:6,1'])->name('verification.send');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');

    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

});

Route::group(['prefix' => 'admin'], function() {

   Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

});

Route::group(['prefix' => 'profile'], function() {

   Route::get('/settings', [ProfileController::class, 'show'])->name('profile.settings');
   Route::post('/settings', [ProfileController::class, 'update'])->name('profile.update');

});

Route::prefix('doctor')->group(function () {
    Route::get('/dashboard', [DoctorController::class, 'dashboard'])->name('doctor.dashboard');
    Route::get('/patients', [DoctorController::class, 'patients'])->name('doctor.patients');
    Route::get('/consultation', [DoctorController::class, 'consultation'])->name('doctor.consultation');
    Route::get('/directory', [DoctorController::class, 'patientDirectory']);
});
