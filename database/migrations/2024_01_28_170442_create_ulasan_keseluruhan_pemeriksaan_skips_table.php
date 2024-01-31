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
        Schema::create('ulasan_keseluruhan_pemeriksaan_skips', function (Blueprint $table) {
            $table->id();
            $table->string('ulasan_ketua_pasukan_pemeriksa');
            $table->string('disediakan_oleh');
            $table->string('disediakan_oleh_tarikh');
            $table->string('disemak_oleh');
            $table->string('disemak_oleh_tarikh');
            $table->integer('butiran_institusi_id');
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
        Schema::dropIfExists('ulasan_keseluruhan_pemeriksaan_skips');
    }
};
