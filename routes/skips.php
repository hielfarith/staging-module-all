<?php

use App\Http\Controllers\PengurusanSkipsController;

Route::controller(PengurusanSkipsController::class)->group(function () {
    Route::prefix('skips')->name('skips.')->group(function() {
        Route::get('borang/{id?}','BorangSkipsBaru')->name('skips_baru');
        Route::post('store/{tab}', 'store')->name('instrumen-submit');
        Route::get('ringkasan-pengisian','RingkasanSkips')->name('ringkasan_skips');
        Route::get('senarai-skips','SenaraiSkips')->name('senarai-skips');
        Route::get('kemaskini-profil', 'kemaskiniProfil')->name('kemaskini-profil');
    });
});
