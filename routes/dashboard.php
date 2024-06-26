<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\User\UserController;
use App\Http\Controllers\Dashboard\Admin\AdminController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Patient\PatientController;
use App\Livewire\Counter;

/*
|--------------------------------
| Dashboard Routes
|--------------------------------
*/

Route::get('/dash', [DashboardController::class, 'index'])->name('dash');

Route::prefix('dashboard')->group(function () {

    //! Admin Routes
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index']);
    });

    //! User Routes
    Route::middleware(['auth:web'])->group(function () {
        Route::get('/user', [UserController::class, 'index']);
    });

    //! patient Routes
    Route::middleware(['auth:patient'])->group(function () {
        Route::get('/patient', [PatientController::class, 'index']);
    });
});
