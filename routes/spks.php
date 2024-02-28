<?php

use App\Http\Controllers\PengurusanSpksController;

Route::controller(PengurusanSpksController::class)->group(function () {
    Route::prefix('spks')->name('spks.')->group(function() {
        Route::get('borang-pengisian/{id?}','BorangSpksBaru')->name('spks_baru');
        Route::post('save-spks/{tab}','saveSpks')->name('save-spks');
        Route::post('get-jumlah','GetJumlah')->name('get-jumlah');
        Route::post('submit-jumlah','SubmitJumlah')->name('submit-jumlah');

        Route::get('borang/{id}/{type}','borangView')->name('borang-view');
        Route::get('senarai-spks','SenaraiSpks')->name('senarai-spks');
        Route::get('verfikasi-senarai','verfikasiSpksSenarai')->name('verfikasi_senarai');
        Route::get('verfikasi-pengisian/{id}','verfikasiSpks')->name('verfikasi_spks');

        Route::get('validasi-senarai','ValidasiSpksSenarai')->name('validasi_senarai');
        Route::get('validasi-pengisian/{id}','ValidasiSpks')->name('validasi_spks');

        Route::get('senarai-instrumen','SenaraiInstrumen')->name('senarai-instrumen');
        Route::get('laporan-penarafan','LaporanPenarafan')->name('laporan-penarafan');
        Route::get('sekolah-penarafan','SenaraiSekolahPenarafan')->name('sekolah-penarafan');
    });
});
