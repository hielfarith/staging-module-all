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
        Schema::create('panel_penilais', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengguna');
            $table->string('no_kad');
            $table->string('email_peribadi');
            $table->string('email_penyelia');
            $table->string('email_ketua_jabatan');
            $table->string('agensi_kementerian');
            $table->string('no_tel_pejabat');
            $table->string('no_tel_peribadi');
            $table->string('alamat1');
            $table->string('alamat2');
            $table->string('alamat3')->nullable();
            $table->string('poskod', 6);
            $table->string('daerah');
            $table->string('negeri');
            $table->string('gred');
            $table->string('negeri_skpak');
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
        Schema::dropIfExists('panel_penilais');
    }
};
