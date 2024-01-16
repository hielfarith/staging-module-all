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
        Schema::create('tetapan_items', function (Blueprint $table) {
            $table->id();
            $table->string('nama_item');
            $table->string('tarikh_kuatkuasa_item');
            $table->string('status_item');
            $table->string('belum_set');
            $table->string('telah_set');
            $table->string('wajaran_skala');
            $table->string('tindakan_oleh_siapa')->nullable();
            $table->string('tetapan_skala');
            $table->string('julat_skala');
            $table->string('markah_skala_mandatori_catatan')->nullable();
            $table->string('role_aspek')->nullable();
            $table->string('type');

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
        Schema::dropIfExists('tetapan_items');
    }
};
