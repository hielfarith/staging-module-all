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
        Schema::create('profil_pengguna', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengguna');
            $table->string('no_kad');
            $table->string('email_peribadi');
            $table->string('email_taska');
            $table->string('email_pejabat_penyelia');
            $table->string('agensi_kementerian');
            $table->string('jenis');
            $table->string('jawatan');
            $table->string('gred');
            $table->integer('status');
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
        Schema::dropIfExists('profil_pengguna');
    }
};
