<?php

use App\Http\Controllers\PengurusanIkepsController;

Route::controller(PengurusanIkepsController::class)->group(function () {
    Route::prefix('ikeps')->name('ikeps.')->group(function() {
        Route::get('','BorangIkepsBaru')->name('ikeps_baru');
        Route::post('store/{tab}', 'store')->name('store');
        Route::get('ringkasan-pengisian','RingkasanIkeps')->name('ringkasan_ikeps');
    });
});
