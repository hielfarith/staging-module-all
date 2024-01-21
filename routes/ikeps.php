<?php

use App\Http\Controllers\PengurusanIkepsController;

Route::controller(PengurusanIkepsController::class)->group(function () {
    Route::prefix('ikeps')->name('ikeps.')->group(function() {
        Route::get('borang-pengisian/{tahun?}','BorangIkepsBaru')->name('ikeps_baru');
        Route::post('store/{tab}', 'store')->name('store');
        Route::get('ringkasan-pengisian/{tahun?}','RingkasanIkeps')->name('ringkasan_ikeps');

        Route::get('laporan-pengisian','LaporanRingkasanIkeps')->name('laporan_ikeps');
        Route::get('pemantauan-pengisian','PemantauanPengisianIkeps')->name('pemantauan_ikeps');
        Route::get('dashboard','DashboardIkeps')->name('dashboard_ikeps');       
    });
});
