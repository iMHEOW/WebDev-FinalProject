<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function() {

   Route::get('/dashboard', [AdminController::class, 'dashboard']);

});