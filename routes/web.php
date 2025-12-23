<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlatController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('booking', BookingController::class);
});

Route::middleware(['auth','role:admin'])->group(function () {
    Route::resource('/alat', AlatController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('booking', BookingController::class);
});

Route::post('/booking', [DashboardController::class, 'store'])
    ->middleware('auth');
