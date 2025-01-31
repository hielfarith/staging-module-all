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
        Schema::create('instrumen_skpak_spks_ikep', function (Blueprint $table) {
            $table->id();
            $table->string('nama_instrumen');
            $table->longText('tujuan_instrumen');
            $table->string('pengguna_instrumen');
            $table->string('pengisian_oleh');
            $table->string('pengesahan_ole');
            $table->string('verifikasi_oleh');
            $table->string('validasi_oleh');
            $table->string('perakuan_oleh');
            $table->string('tempoh_bagi_setiap_proses')->nullable();
            $table->string('instrumen_perlu_diisi')->nullable();
            $table->string('tarikh_kuatkuasa');
            $table->tinyInteger('tetapan_keperluan_pengemaskinian_data_terkini')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('tempoh_pengisian');
            $table->string('tempoh_pengisian_lain');
            $table->string('tempoh_pengeshan');
            $table->string('tempoh_pengeshan_lain');
            $table->string('tempoh_verifikasi');
            $table->string('tempoh_verifikasi_lain');
            $table->string('tempoh_validasi');
            $table->string('tempoh_validasi_lain');
            $table->string('tempoh_perakuan');
            $table->string('tempoh_perakuan_lain');
            $table->string('type');
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
         Schema::dropIfExists('instrumen_skpak_spks_ikep');

    }
};
