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
        Schema::create('tetapan_aspeks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_aspek');
            $table->string('tarikh_kuatkuasa_aspek');
            $table->string('status_aspek');
            $table->string('belum_set');
            $table->string('telah_set');
            $table->string('wajaran_skala');
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
        Schema::dropIfExists('tetapan_aspeks');
    }
};
