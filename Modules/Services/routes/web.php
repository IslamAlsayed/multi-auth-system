<?php

use Illuminate\Support\Facades\Route;
use Modules\Services\Http\Controllers\ServicesController;

/*
|-----------------------------
| Web Routes
|-----------------------------
*/

Route::prefix('dashboard')->group(function () {
    //! Admin Routes
    Route::get('/services', [ServicesController::class, 'index'])->name('services');

    Route::middleware(['auth:admin'])->group(function () {
        Route::post('/services', [ServicesController::class, 'store'])->name('services');
        Route::patch('/services/update', [ServicesController::class, 'update'])->name('services.update');
        Route::patch('/services/updateStatus', [ServicesController::class, 'updateStatus'])->name('services.updateStatus');
        Route::delete('/services', [ServicesController::class, 'destroy'])->name('services');
    });
});
