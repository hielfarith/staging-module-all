<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrumen_skpak_spks_ikeps', function (Blueprint $table) {
            $table->id();
            $table->string('nama_instrumen');
            $table->longText('tujuan_instrumen');
            $table->string('pengguna_instrumen');
            $table->string('pengisian_oleh');
            $table->string('pengesahan_ole');
            $table->string('verifikasi_oleh');
            $table->string('validasi_oleh');
            $table->string('perakuan_oleh');
            $table->string('tempoh_bagi_setiap_proses');
            $table->string('instrumen_perlu_diisi')->nullable();
            $table->string('tarikh_kuatkuasa');
            $table->tinyInteger('tetapan_keperluan_pengemaskinian_data_terkini');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instrumen_skpak_spks_ikeps');
    }
};
