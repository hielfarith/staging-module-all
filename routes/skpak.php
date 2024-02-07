<?php

use App\Http\Controllers\PengurusanSkpakController;

Route::controller(PengurusanSkpakController::class)->group(function () {
    Route::prefix('skpak')->name('skpak.')->group(function() {
        Route::get('borang-pengisian/{id?}','BorangSkpakBaru')->name('skpak_baru');
        Route::get('ringkasan-pengisian','RingkasanSkpak')->name('ringkasan_skpak');
        Route::post('save-skpak/{tab}','saveSkpak')->name('save-skpak');

        Route::get('validasi-pengisian','ValidasiSkpak')->name('validasi_skpak');
        Route::get('senarai-skpak','SenaraiSkpak')->name('senarai-skpak');
        Route::post('get-jumlah','GetJumlah')->name('get-jumlah');
        Route::post('submit-spkak','SubmitSpkak')->name('submit-spkak');

    });
});
