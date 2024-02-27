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
        Schema::create('ahli_jawatankuasa_kerjas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengguna');
            $table->string('panggilan');
            $table->string('no_kad');
            $table->string('jawatan');
            $table->string('alamat1');
            $table->string('alamat2');
            $table->string('alamat3')->nullable();
            $table->string('poskod', 5);
            $table->string('daerah');
            $table->string('negeri');
            $table->string('email_peribadi');
            $table->string('nama_majikan')->nullable();
            $table->string('email_majikan')->nullable();
            $table->string('agensi_kementerian');
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
        Schema::dropIfExists('ahli_jawatankuasa_kerjas');
    }
};
