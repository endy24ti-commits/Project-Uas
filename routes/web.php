<?php

use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/forms', [AdminController::class, 'forms'])->name('admin.forms');
Route::get('/admin/tables', [AdminController::class, 'tables'])->name('admin.tables');
Route::get('/admin/calendar', [AdminController::class, 'calendar'])->name('admin.calendar');
Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');