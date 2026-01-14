<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlatController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('Auth.login');
});

Route::get('/register', function () {
    return view('Auth.register');
});

Route::resource('alat', AlatController::class);