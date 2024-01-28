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
        Schema::create('butiran_institusi_skips', function (Blueprint $table) {
            $table->id();
            $table->string('nama_institusi');
            $table->string('nama_pengetua');
            $table->string('alamat');
            $table->string('negeri');
            $table->string('no_telephone');
            $table->string('fax');
            $table->string('email');
            $table->string('laman_web');
            $table->string('no_perakuan_pendaftaran');
            $table->string('tarikh_tamat_perakuan');
            $table->string('no_surat_kelulusan');
            $table->string('tarikh_tamat_kelulusan');
            $table->string('no_pendaftaran_syarikat');
            $table->string('no_lesen_perniagaan');
            $table->string('bilangan_enrolmen_pelajar');
            $table->string('kapasiti_maksimum_pelajar');
            $table->string('bilangan_pelajar_tempatan');
            $table->string('pecahan_tempatan_lelaki');
            $table->string('pecahan_tempatan_perempuan');
            $table->string('bilangan_pelajar_antarabangsa');
            $table->string('pecahan_pelajar_lelaki');
            $table->string('pecahan_pelajar_perempuan');
            $table->string('bilangan_guru_keseluruhan');
            $table->string('pecahan_temparan');
            $table->string('pecahan_antarabangsa');
            $table->string('tarikh_audit');
            $table->string('tarikh_lapor');

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
        Schema::dropIfExists('butiran_institusi_skips');
    }
};
