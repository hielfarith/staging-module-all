<?php

use App\Http\Controllers\PengurusanSkipsController;

Route::controller(PengurusanSkipsController::class)->group(function () {
    Route::prefix('skips')->name('skips.')->group(function() {
        Route::get('borang/{id?}','BorangSkipsBaru')->name('skips_baru');
        Route::get('verfikasi/{id}','BorangSkipsBaru')->name('verfikasi-view');
        Route::post('store/{tab}', 'store')->name('instrumen-submit');
        Route::post('update-status', 'updateStatus')->name('instrumen-update');
        Route::get('ringkasan-pengisian','RingkasanSkips')->name('ringkasan_skips');
        Route::get('verfikasi','SenaraiSkips')->name('verfikasi-skips');
        Route::get('validasi','SenaraiSkips')->name('validasi-skips');
        Route::get('validasi/{id}', 'BorangSkipsBaru')->name('validasi-view');
        Route::post('choose-institute-details', 'chooseInstituteDetails')->name('choose-institute-details');

        Route::get('pelaporan-penarafan', 'SenaraiSkips')->name('pelaporan-penarafan');

        Route::get('senarai-institusi', 'SenaraiInstitusi')->name('senarai_institusi');
        Route::get('institusi-baru', 'InstitusiBaru')->name('institusi_baru');
        Route::post('save-institusi', 'saveInstitusi')->name('save-institusi');

        Route::get('kemaskini-profil', 'kemaskiniProfil')->name('kemaskini-profil');

        Route::get('dashboard', 'DashboardSkips')->name('dashboard_skips');
    });
});
