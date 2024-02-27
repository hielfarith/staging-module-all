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
        Schema::create('spks_pengisians', function (Blueprint $table) {
            $table->id();
            $table->longText('aspek1')->nullable();
            $table->longText('aspek2')->nullable();
            $table->longText('aspek3')->nullable();
            $table->longText('aspek4')->nullable();
            $table->longText('aspek5')->nullable();
            $table->longText('aspek6')->nullable();
            $table->tinyInteger('status')->nullable();;
            $table->integer('instrumen_id');
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
        Schema::dropIfExists('spks_pengisians');
    }
};
