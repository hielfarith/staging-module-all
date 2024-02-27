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
        Schema::create('tetapan_tarikh_instrumens', function (Blueprint $table) {
            $table->id();
            $table->string('tarikh_mula');
            $table->string('tarikh_mula_hari')->nullable();
            $table->string('tarikh_mula_bulan');
            $table->string('tarikh_mula_tahun');
            $table->string('tarikh_akhir');
            $table->string('tarikh_akhir_hari')->nullable();
            $table->string('tarikh_akhir_bulan');
            $table->string('tarikh_akhir_tahun');
            $table->string('type')->nullable();
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
        Schema::dropIfExists('tetapan_tarikh_instrumens');
    }
};
