<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\AlatController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});
use App\Http\Controllers\DashboardController;
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::resource('user', UserController::class);

Route::get('/login', function () {
    return view('Auth.login');
});

Route::get('/register', function () {
    return view('Auth.register');
});

Route::resource('alat', AlatController::class);
