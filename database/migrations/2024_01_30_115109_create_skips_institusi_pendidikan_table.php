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
        Schema::create('skips_institusi_pendidikan', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->string('nama');
            $table->text('alamat');
            $table->string('no_perakuan');
            $table->string('no_tel');
            $table->string('email');
            $table->string('nama_pengerusi_pengurus');
            $table->string('no_kp_pengerusi_pengurus');
            $table->string('nama_pengetua_gurubesar');
            $table->string('no_kp_pengetua_gurubesar');
            $table->date('tarikh_daftar');
            $table->date('tarikh_tamat_daftar');
            $table->string('status');
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
        Schema::dropIfExists('skips_institusi_pendidikan');
    }
};
