<?php

use App\Http\Controllers\PengurusanSkpakController;

Route::controller(PengurusanSkpakController::class)->group(function () {
    Route::prefix('skpak')->name('skpak.')->group(function() {
        Route::get('borang-pengisian/{id?}','BorangSkpakBaru')->name('skpak_baru');
        Route::get('ringkasan-pengisian','RingkasanSkpak')->name('ringkasan_skpak');
        Route::post('save-skpak/{tab}','saveSkpak')->name('save-skpak');

        Route::get('validasi-pengisian/{id}','ValidasiSkpak')->name('validasi_skpak');

        Route::get('validasi-senarai','validasiSkpakSenarai')->name('validasi_senarai');
        Route::get('verfikasi-senarai','verfikasiSkpakSenarai')->name('verfikasi_senarai');
        Route::get('verfikasi-pengisian/{id}','verfikasiSkpak')->name('verfikasi_skpak');
        Route::get('senarai-skpak','SenaraiSkpak')->name('senarai-skpak');
        Route::post('get-jumlah','GetJumlah')->name('get-jumlah');
        Route::post('get-verfikasi-jumlah','GetTabJumlahVerfikasi')->name('get-verfikasi-jumlah');
        Route::post('get-jumlah-skor','GetJumlahSkor')->name('get-jumlah-skor');

        Route::post('submit-spkak','SubmitSpkak')->name('submit-spkak');
        Route::post('save-spkak-verfikasi/{tab}','saveVerfiksai')->name('save-verfikasi');
        Route::get('borang/{id}/{type}','borangView')->name('borang-view');

        Route::get('dashboard','DashboardSkpak')->name('dashboard');

        Route::get('senarai-penetapan','senaraiPenetapan')->name('senarai_penetapan');
        Route::get('penetapan-baru','penetapanBaru')->name('penetapan_baru');

        Route::get('validasi-pengisian','ValidasiSkpak')->name('validasi_skpak');
        Route::get('soal-selidik','SoalSelidikPenilai')->name('soalselidik_penilai');

        Route::get('rentas-evaluation','borangRentas')->name('borang_rentas');

    });
});
