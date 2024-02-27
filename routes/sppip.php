<?php

use App\Http\Controllers\formPdfController;

use App\Http\Controllers\PengurusanInstrumenController;


Route::controller(PengurusanInstrumenController::class)->group(function () {
    Route::prefix('pengurusan_instrumen')->group(function() {
        Route::get('instrumen_baru','TambahInstrumen')->name('instrumen_baru');
        Route::get('lihat_instrumen','LihatInstrumen')->name('lihat_instrumen');
        Route::get('show_all_forms','showAllForms')->name('show_all_forms');
        Route::post('sahkan_kategori_instrumen','SahkanKategoriInstrumen')->name('sahkan_kategori_instrumen');


        Route::post('simpan_atribut','SimpanAtribut')->name('simpan_atribut');
        Route::post('simpan_borang_instrumen','SimpanBorangInstrumen')->name('simpan_borang_instrumen');
    });

    Route::prefix('instrumen_dijawab')->group(function() {
        Route::get('senarai_instrumen_dijawab','SenaraiInstrumenTelahDijawab')->name('senarai_instrumen_dijawab');
        Route::post('instrumen_dijawab/{id}','LihatInstrumenDijawab')->name('instrumen_dijawab');
    });

    Route::prefix('jawab_instrumen')->group(function() {
        Route::get('pilih_instrumen','PilihInstrumen')->name('pilih_instrumen');
        Route::post('senarai_atribut_instrumen','SenaraiAtributInstrumen')->name('senarai_atribut_instrumen');
        Route::post('simpan_instrumen_dijawab','SimpanInstrumenTelahDijawab')->name('simpan_instrumen_dijawab');
        Route::get('muat_turun/{id}/{name}','MuatTurunFailDalamInstrumen')->name('muat_turun');
    });

    Route::get('/generate-pdf', [formPdfController::class, 'generatePDF'])->name('generatePDF');
    Route::get('/generate-pdf2', [formPdfController::class, 'generatePDF2'])->name('generatePDF2');
    Route::get('/generate-pdf3', [formPdfController::class, 'generatePDF3'])->name('generatePDF3');
    Route::get('/generate-pdf4', [formPdfController::class, 'generatePDF4'])->name('generatePDF4');
    Route::get('/generate-pdf5', [formPdfController::class, 'generatePDF5'])->name('generatePDF5');


});
