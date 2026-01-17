<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| GUEST
|--------------------------------------------------------------------------
| Akses tanpa login → dashboard
*/
Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| AUTH (LOGIN & REGISTER)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    // LOGIN
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // REGISTER (USER & STAFF SAJA)
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

/*
|--------------------------------------------------------------------------
| AUTHENTICATED
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // LOGOUT
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | SUPERADMIN
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:superadmin')->group(function () {
        Route::resource('user', UserController::class);
    });

    /*
    |--------------------------------------------------------------------------
    | SUPERADMIN & STAFF
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:superadmin,staff')->group(function () {
        Route::resource('alat', AlatController::class);
    });

    /*
    |--------------------------------------------------------------------------
    | SUPERADMIN, STAFF, USER
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:superadmin,staff,user')->group(function () {
        Route::resource('booking', BookingController::class);
    });
});
