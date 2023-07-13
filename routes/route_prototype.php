<?php

use App\Http\Controllers\PrototypeController\PermohonanController;

Route::controller(PermohonanController::class)->group(function () {
    Route::get('senarai_permohonan', 'SenaraiPermohonan')->name('senarai_permohonan');
});