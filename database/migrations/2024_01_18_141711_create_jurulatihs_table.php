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
        Schema::create('jurulatihs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengguna');
            $table->string('no_kad');
            $table->string('warganegara');
            $table->string('jantina');
            $table->string('kaum');
            $table->string('tarikh_lahir');
            $table->string('telefon_rumah');
            $table->string('telefon_bimbit');
            $table->string('email');
            $table->string('gred_jawatan');
            $table->string('tarikh_lantikan');
            $table->string('tarikh_mula');
            $table->string('majikan');
            $table->string('jarak_rumah');
            $table->string('penerima_bayaran');
            $table->string('jurulaith_sukan');
            $table->string('alamat1');
            $table->string('alamat2');
            $table->string('alamat3')->nullable();
            $table->string('bandar');
            $table->string('negeri');
            $table->string('poskod');
            $table->longText('maklumat_kesihatan');
            $table->longText('maklumat_sekolah');
            $table->string('persijilan');
            $table->string('tahap_gred');
            $table->string('tarikh_pensijilan');
            $table->string('sijil_path');
            $table->string('sains_sukan_persijilan');
            $table->string('sains_sukan_tarikh_pensijilan');
            $table->string('sains_sukan_sijil_path');
            $table->string('spkk_persijilan');
            $table->string('spkk_tarikh_pensijilan');
            $table->string('spkk_sijil_path');
            $table->string('sukan_permainan');
            $table->string('kejohanan');
            $table->string('tahun');
            $table->string('peringkat');
            $table->string('anugerah');
            $table->string('anugerah_tahun');
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
        Schema::dropIfExists('jurulatihs');
    }
};
