<?php

use App\Http\Controllers\PengurusanInstrumenController;

Route::controller(PengurusanInstrumenController::class)->group(function () {
    Route::prefix('pengurusan_instrumen')->group(function () {
        Route::get('senarai_instrumen','SenaraiInstrumen')->name('senarai_instrumen');
        Route::get('instrumen_baru','TambahInstrumen')->name('instrumen_baru');
    });

    Route::prefix('maklumat_instrumen')->group(function () {
        Route::post('instrumen_dijawab/{id}','LihatDataInstrumen')->name('instrumen_dijawab');
    });
});
