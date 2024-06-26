<?php

use Illuminate\Support\Facades\Route;
use Modules\Doctors\Http\Controllers\DoctorsController;

/*
|--------------------------------
| Section Routes
|--------------------------------
*/

Route::prefix('dashboard')->group(function () {
    //! Admin Routes
    Route::get('/doctors', [DoctorsController::class, 'index'])->name('doctors');

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/doctors/add', [DoctorsController::class, 'create'])->name('doctors.create');
        Route::get('/doctors/{id}/edit', [DoctorsController::class, 'edit'])->name('doctors.edit');

        Route::post('/doctors', [DoctorsController::class, 'store'])->name('doctors');
        Route::patch('/doctors/update', [DoctorsController::class, 'update'])->name('doctors.update');
        Route::patch('/doctors/updateStatus', [DoctorsController::class, 'updateStatus'])->name('doctors.updateStatus');
        Route::delete('/doctors', [DoctorsController::class, 'destroy'])->name('doctors');
    });

    //! change email
    Route::get('/doctors/{id}/changeEmail', [DoctorsController::class, 'changeEmail'])->name('doctors.changeEmail');
    Route::patch('/doctors/updateEmail', [DoctorsController::class, 'updateEmail'])->name('doctors.updateEmail');

    //! change password
    Route::get('/doctors/{id}/changePassword', [DoctorsController::class, 'changePassword'])->name('doctors.changePassword');
    Route::patch('/doctors/updatePassword', [DoctorsController::class, 'updatePassword'])->name('doctors.updatePassword');
});
