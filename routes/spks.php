<?php

use App\Http\Controllers\PengurusanSpksController;

Route::controller(PengurusanSpksController::class)->group(function () {
    Route::prefix('spks')->name('spks.')->group(function() {
        Route::get('borang-pengisian','BorangSpksBaru')->name('spks_baru');

        Route::get('validasi-senarai','ValidasiSpksSenarai')->name('validasi_senarai');
        Route::get('validasi-pengisian','ValidasiSpks')->name('validasi_pengisian');
    });
});
