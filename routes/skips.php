<?php

use App\Http\Controllers\PengurusanSkipsController;

Route::controller(PengurusanSkipsController::class)->group(function () {
    Route::prefix('skips')->name('skips.')->group(function() {
        Route::get('','BorangSkipsBaru')->name('skips_baru');
        Route::post('store/{tab}', 'store')->name('store');
        Route::get('ringkasan-pengisian','RingkasanSkips')->name('ringkasan_skips');
    });
});
