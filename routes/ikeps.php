<?php

use App\Http\Controllers\PengurusanIkepsController;

Route::controller(PengurusanIkepsController::class)->group(function () {
    Route::prefix('ikeps')->name('ikeps.')->group(function() {
        Route::get('','BorangIkepsBaru')->name('ikeps_baru');
        Route::post('store/{tab}', 'store')->name('store');
        Route::get('ringkasan-pengisian','RingkasanIkeps')->name('ringkasan_ikeps');

        Route::get('laporan-pengisian','LaporanRingkasanIkeps')->name('laporan_ikeps');
        Route::get('pemantauan-pengisian','PemantauanPengisianIkeps')->name('pemantauan_ikeps');
        Route::get('dashboard','DashboardIkeps')->name('dashboard_ikeps');

    });
});
