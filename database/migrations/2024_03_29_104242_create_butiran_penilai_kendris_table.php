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
        Schema::create('butiran_penilai_kendiris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penilai_kendiri');
            $table->string('no_kad_pengenalan');
            $table->string('no_telephoe');
            $table->string('email');
            $table->string('jawatan_penilai');
            $table->string('tarikh_penilaian_kendiri');
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
        Schema::dropIfExists('butiran_penilai_kendiris');
    }
};
