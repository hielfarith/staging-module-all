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
        Schema::create('skpak_standard_penilaians', function (Blueprint $table) {
            $table->id();
            $table->longText('penilaian1')->nullable();
            $table->longText('penilaian2')->nullable();
            $table->longText('penilaian3')->nullable();
            $table->longText('penilaian4')->nullable();
            $table->longText('penilaian5')->nullable();
            $table->longText('penilaian6')->nullable();
            $table->tinyInteger('status');
            $table->integer('instrument_id');
            $table->text('jumlah')->nullable();
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
        Schema::dropIfExists('skpak_standard_penilaians');
    }
};
