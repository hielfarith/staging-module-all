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
        Schema::create('butiran_pemeriksaan_skips', function (Blueprint $table) {
            $table->id();
            $table->string('tarikh_pemeriksaan');
            $table->string('no_pasukan_pemeriksa');
            $table->string('pemeriksa_1');
            $table->string('pemeriksa_2');
            $table->string('pemeriksa_3');
            $table->string('kod_sekolah');
            $table->string('ketua_pemeriksa');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('butiran_pemeriksaan_skips');
    }
};
