<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

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

Route::group(['prefix' => 'profile'], function() {

   Route::get('/settings', [ProfileController::class, 'show'])->name('profile.settings');
   Route::post('/settings', [ProfileController::class, 'update'])->name('profile.update');

});