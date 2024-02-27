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
        Schema::create('item_standard_quality_skips', function (Blueprint $table) {
            $table->id();
            $table->longText('penubuhan_pendaftaran')->nullable();
            $table->longText('pengurusan_institusi')->nullable();
            $table->longText('pengurusan_kurikulum')->nullable();
            $table->longText('pengajaran')->nullable();
            $table->longText('pengurusan_penilaian')->nullable();
            $table->longText('pengurusan_pembangunan_guru')->nullable();
            $table->longText('displin')->nullable();
            $table->longText('piawaian')->nullable();
            $table->longText('kebersihan')->nullable();
            $table->longText('pengurusan_pelajar_antarabangsa')->nullable();
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
        Schema::dropIfExists('item_standard_quality_skips');
    }
};
