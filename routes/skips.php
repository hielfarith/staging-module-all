<?php

use App\Http\Controllers\PengurusanSkipsController;

Route::controller(PengurusanSkipsController::class)->group(function () {
    Route::prefix('skips')->name('skips.')->group(function() {
        Route::get('borang/{id?}/{type?}','BorangSkipsBaru')->name('skips_baru');
        Route::get('verfikasi/{id}','BorangSkipsBaru')->name('verfikasi-view');

        Route::get('skips_sekolah/{id?}/{type?}','BorangSkipsSekolahBaru')->name('skips_sekolah');


        Route::get('skips-fmf/{id}','FmfView')->name('fmf-view');

        Route::post('store/{tab}', 'store')->name('instrumen-submit');
        Route::post('update-status', 'updateStatus')->name('instrumen-update');
        Route::get('ringkasan-pengisian','RingkasanSkips')->name('ringkasan_skips');
        Route::get('verfikasi','laporanSkips')->name('verfikasi-skips');
        Route::get('validasi','SenaraiSkips')->name('validasi-skips');
        Route::get('validasi/{id}', 'BorangSkipsBaru')->name('validasi-view');
        Route::post('choose-institute-details', 'chooseInstituteDetails')->name('choose-institute-details');

        Route::get('pelaporan-penarafan', 'laporanSkips')->name('pelaporan-penarafan');
        Route::get('download-demografi/{institusi_id}', 'downloadDemografi')->name('download-demografi');

        Route::get('senarai-institusi', 'SenaraiInstitusi')->name('senarai_institusi');
        Route::get('senarai-skips-institusi', 'SenaraiSkipsInstitusi')->name('senarai-skips-institusi');
        Route::get('senarai-skips-institusi-sekolah', 'SenaraiSkipsInstitusiSekolah')->name('senarai-skips-institusi-sekolah');
        Route::get('institusi-baru', 'InstitusiBaru')->name('institusi_baru');
        Route::post('save-institusi', 'saveInstitusi')->name('save-institusi');

        Route::get('kemaskini-profil', 'kemaskiniProfil')->name('kemaskini-profil');

        Route::get('dashboard', 'DashboardSkips')->name('dashboard_skips');
        Route::get('dashboard/view/{instrumen_id}', 'dashboardInstrumen')->name('dashboard.instrumen');

        Route::get('laporan/{id}', 'ViewRecord')->name('view');
        Route::get('kemaskini/{instrumen_id}', 'EditRecord')->name('edit');


    });
});
