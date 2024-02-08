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
        Schema::create('skpak_verfikasi_validasis', function (Blueprint $table) {
            $table->id();
            $table->longText('itemcq1')->nullable();
            $table->longText('itemcq2')->nullable();
            $table->longText('itemcq3')->nullable();
            $table->longText('itemcq4')->nullable();
            $table->longText('itemcq5')->nullable();
            $table->longText('senarai_semak')->nullable();
            $table->tinyInteger('status')->nullable();;
            $table->integer('skpak_standard_penilaian_id');
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
        Schema::dropIfExists('skpak_verfikasi_validasis');
    }
};
