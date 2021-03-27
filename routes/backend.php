<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\BackupController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\DashboardController;




Route::get('/dashboard',DashboardController::class)->name('dashboard');
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);


// Backups
Route::resource('backups', BackupController::class)->only(['index', 'store', 'destroy']);
Route::get('backups/{file_name}', [BackupController::class, 'download'])->name('backups.download');
Route::delete('backups', [BackupController::class, 'clean'])->name('backups.clean');


// Profile
Route::get('profile/', [ProfileController::class, 'index'])->name('profile.index');
Route::post('profile/', [ProfileController::class, 'update'])->name('profile.update');