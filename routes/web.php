<?php

use App\Http\Controllers\AuthController;
<<<<<<< HEAD
use App\Http\Controllers\UserController;
=======
use App\Http\Controllers\AlatController;

>>>>>>> 40eb93f1a582631460f8955ba38b1da2accace08
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

<<<<<<< HEAD
use App\Http\Controllers\DashboardController;
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/forms', [AdminController::class, 'forms'])->name('admin.forms');
Route::get('/admin/tables', [AdminController::class, 'tables'])->name('admin.tables');
Route::get('/admin/calendar', [AdminController::class, 'calendar'])->name('admin.calendar');
Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');



Route::resource('user', UserController::class);
=======
Route::get('/login', function () {
    return view('Auth.login');
});

Route::get('/register', function () {
    return view('Auth.register');
});

Route::resource('alat', AlatController::class);
>>>>>>> 40eb93f1a582631460f8955ba38b1da2accace08
