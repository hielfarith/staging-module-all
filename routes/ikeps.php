<?php

use App\Http\Controllers\PengurusanIkepsController;

Route::controller(PengurusanIkepsController::class)->group(function () {
    Route::prefix('ikeps')->name('ikeps.')->group(function() {
        Route::get('borang-pengisian/{tahun?}','BorangIkepsBaru')->name('ikeps_baru');
        Route::get('get-sub-details/{tab}/{type}', 'getSubDetails')->name('get_sub_details');
        Route::get('get-status-penyertaan', 'getStatusPenyertaan')->name('get_status_penyertaan');
        Route::post('store/{tab}', 'store')->name('store');
        Route::get('ringkasan-pengisian/{tahun?}','RingkasanIkeps')->name('ringkasan_ikeps');
        Route::get('ringkasan-pengisian-fmf/{tahun?}','RingkasanIkepsFmf')->name('ringkasan_ikeps_fmf');

        Route::get('laporan-pengisian','LaporanRingkasanIkeps')->name('laporan_ikeps');
        Route::get('pemantauan-pengisian','PemantauanPengisianIkeps')->name('pemantauan_ikeps');
        Route::get('dashboard','DashboardIkeps')->name('dashboard_ikeps'); 
        Route::post('verify', 'verify')->name('verify-ikeps');      
    });
});
