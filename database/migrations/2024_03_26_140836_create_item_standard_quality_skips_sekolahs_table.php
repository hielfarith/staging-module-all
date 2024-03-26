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
        Schema::create('item_standard_quality_skips_sekolahs', function (Blueprint $table) {
            $table->id();
            $table->longText('penubuhan_pendaftaran')->nullable();
            $table->longText('pengurusan_institusi')->nullable();
            $table->longText('pengurusan_kurikulum')->nullable();
            $table->longText('pembelajaran')->nullable();
            $table->longText('pengurusan_penilaian')->nullable();
            $table->longText('pengurusan_pembangunan_guru')->nullable();
            $table->longText('pengurusan_kesihatan_murid')->nullable();
            $table->longText('displin')->nullable();
            $table->longText('piawaian')->nullable();
            $table->longText('pencapaian_academik')->nullable();
            $table->longText('pencapaian_kokurikulum')->nullable();
            $table->longText('kemenjadian_murid')->nullable();
            $table->longText('perwatakan_sekolah')->nullable();
            $table->longText('kokurikulum')->nullable();
            $table->longText('kebersihan')->nullable();
            $table->integer('butiran_institusi_id');
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('item_standard_quality_skips_sekolahs');
    }
};
