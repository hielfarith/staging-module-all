<?php

use App\Http\Controllers\PengurusanSpksController;

Route::controller(PengurusanSpksController::class)->group(function () {
    Route::prefix('spks')->name('spks.')->group(function() {
        Route::get('borang-pengisian/{id?}','BorangSpksBaru')->name('spks_baru');
        Route::post('save-spks/{tab}','saveSpks')->name('save-spks');

        Route::get('validasi-senarai','ValidasiSpksSenarai')->name('validasi_senarai');
        Route::get('validasi-pengisian','ValidasiSpks')->name('validasi_pengisian');
    });
});
