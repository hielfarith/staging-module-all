<?php

use App\Http\Controllers\PengurusanSpksController;

Route::controller(PengurusanSpksController::class)->group(function () {
    Route::prefix('spks')->name('spks.')->group(function() {
        Route::get('borang-pengisian','BorangSpksBaru')->name('spks_baru');
    });
});
