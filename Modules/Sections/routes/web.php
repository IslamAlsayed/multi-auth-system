<?php

use Illuminate\Support\Facades\Route;
use Modules\Sections\Http\Controllers\SectionsController;

/*
|--------------------------------
| Section Routes
|--------------------------------
*/

Route::prefix('dashboard')->group(function () {
    //! Admin Routes
    Route::get('/sections', [SectionsController::class, 'index'])->name('sections');
    Route::get('/sections/show/{id}', [SectionsController::class, 'show'])->name('sections.show');

    Route::middleware(['auth:admin'])->group(function () {
        Route::post('/sections', [SectionsController::class, 'store'])->name('sections');
        Route::patch('/sections', [SectionsController::class, 'update'])->name('sections');
        Route::delete('/sections', [SectionsController::class, 'destroy'])->name('sections');
    });
});
