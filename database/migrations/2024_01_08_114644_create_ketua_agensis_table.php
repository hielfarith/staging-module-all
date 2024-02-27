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
        Schema::create('ketua_agensis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengguna');
            $table->string('panggilan');
            $table->string('no_kad');
            $table->string('jawatan');
            $table->string('gred')->nullable();
            $table->string('jenis');
            $table->string('modul');
            $table->string('agensi_kementerian');
            $table->string('email_ketua');
            $table->string('alamat1');
            $table->string('alamat2');
            $table->string('alamat3')->nullable();
            $table->string('poskod', 6);
            $table->string('daerah');
            $table->string('negeri');
            $table->string('no_tel_pejabat')->nullable();
            $table->string('no_tel_peribadi');
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
        Schema::dropIfExists('ketua_agensis');
    }
};
