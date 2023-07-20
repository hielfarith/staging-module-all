<?php

use App\Http\Controllers\PrototypeController\PermohonanController;
use App\Http\Controllers\PrototypeController\AdminController;

Route::controller(PermohonanController::class)->group(function () {
    Route::get('senarai_permohonan', 'SenaraiPermohonan')->name('senarai_permohonan');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('profile', 'UserProfile')->name('prototype_profile');
    Route::get('borang_instrumen', 'TambahInstrumen')->name('tambah_instrumen');
    Route::get('instrumen', 'SenaraiInstrumen')->name('senarai_instrumen');
    Route::get('isi_instrumen', 'JawabInstrumen')->name('jawab_instrumen');


});
