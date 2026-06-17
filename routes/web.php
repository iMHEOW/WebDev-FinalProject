<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function() {

   Route::get('/', [UserAdminController::class, 'index']);

});