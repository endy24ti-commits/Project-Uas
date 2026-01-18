<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\BookingController;

/*guest*/
Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

/*login dan daftar*/
Route::middleware('guest')->group(function () {
    // LOGIN
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // REGISTER (USER & STAFF SAJA)
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

/*autentikasi*/
Route::middleware('auth')->group(function () {

    // LOGOUT
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    /*admin*/
    Route::middleware('role:superadmin')->group(function () {
        Route::resource('user', UserController::class);
    });

    /*admin*/
    Route::middleware('role:superadmin,staff')->group(function () {
        Route::resource('alat', AlatController::class);
    });

    /*admin, staff dan user*/
    Route::middleware('role:superadmin,staff,user')->group(function () {
        Route::resource('booking', BookingController::class);
    });
});
