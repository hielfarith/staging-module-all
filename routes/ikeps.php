<?php

use App\Http\Controllers\PengurusanIkepsController;

Route::controller(PengurusanIkepsController::class)->group(function () {
    Route::prefix('ikeps')->group(function() {
        Route::get('','BorangIkepsBaru')->name('ikeps_baru');
        Route::get('ringkasan-pengisian','RingkasanIkeps')->name('ringkasan_ikeps');
    });
});
