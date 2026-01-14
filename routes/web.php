<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

use App\Http\Controllers\DashboardController;
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/forms', [AdminController::class, 'forms'])->name('admin.forms');
Route::get('/admin/tables', [AdminController::class, 'tables'])->name('admin.tables');
Route::get('/admin/calendar', [AdminController::class, 'calendar'])->name('admin.calendar');
Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');



Route::resource('user', UserController::class);
