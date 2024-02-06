<?php

use App\Http\Controllers\PengurusanSkpakController;

Route::controller(PengurusanSkpakController::class)->group(function () {
    Route::prefix('skpak')->name('skpak.')->group(function() {
        Route::get('borang-pengisian','BorangSkpakBaru')->name('skpak_baru');
        Route::get('ringkasan-pengisian','RingkasanSkpak')->name('ringkasan_skpak');

        Route::get('validasi-pengisian','ValidasiSkpak')->name('validasi_skpak');
    });
});
