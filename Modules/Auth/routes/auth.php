<?php

use Illuminate\Support\Facades\Route;
//? Login roles
use Modules\Auth\Http\Controllers\Auth\Login\AdminController;
use Modules\Auth\Http\Controllers\Auth\Login\UserController;
use Modules\Auth\Http\Controllers\Auth\Login\PatientController;

use Modules\Auth\Http\Controllers\Auth\PasswordController;
use Modules\Auth\Http\Controllers\Auth\NewPasswordController;
use Modules\Auth\Http\Controllers\Auth\VerifyEmailController;
use Modules\Auth\Http\Controllers\Auth\RegisteredUserController;
use Modules\Auth\Http\Controllers\Auth\PasswordResetLinkController;
use Modules\Auth\Http\Controllers\Auth\ConfirmablePasswordController;
use Modules\Auth\Http\Controllers\Auth\AuthenticatedSessionController;
use Modules\Auth\Http\Controllers\Auth\EmailVerificationPromptController;
use Modules\Auth\Http\Controllers\Auth\EmailVerificationNotificationController;

Route::middleware('guest')->group(function () {
    // //! Routes Users
    // Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    // Route::post('register', [RegisteredUserController::class, 'store']);

    // //! Routes Admins
    // Route::post('loginAdmin', [AdminController::class, 'store'])->name('login.admin');

    //! Routes Users
    // Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    // Route::post('loginUser', [AuthenticatedSessionController::class, 'store'])->name('login.user');

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
});

//? Login && Register
Route::middleware('guest')->group(function () {
    //? Login
    Route::get('login', [UserController::class, 'create'])->name('login');

    //? Register
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    //? Login roles
    Route::post('loginAdmin', [AdminController::class, 'store'])->name('login.admin');
    Route::post('loginUser', [UserController::class, 'store'])->name('login.user');
    Route::post('loginPatient', [PatientController::class, 'store'])->name('login.patient');
});

Route::middleware('auth:admin')->group(function () {
    Route::post('logoutAdmin', [AdminController::class, 'destroy'])->name('logout.admin');
});

Route::middleware('auth:web')->group(function () {
    Route::post('logoutUser', [UserController::class, 'destroy'])->name('logout.user');
});

Route::middleware('auth:patient')->group(function () {
    Route::post('logoutPatient', [PatientController::class, 'destroy'])->name('logout.patient');
});
