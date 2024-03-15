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
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->string('instrumen_name');
            $table->string('tarikh_kuatkuasa');
            $table->string('tujuan_instrumen');
            $table->integer('status')->default(0);

            $table->string('pengisian_institut');
            $table->string('pengisian_peranan');
            $table->string('pengisian_dari');
            $table->string('pengisian_hingga');

            $table->string('validasi_institut');
            $table->string('validasi_peranan');
            $table->string('validasi_dari');
            $table->string('validasi_hingga');

            $table->string('verfikasi_institut');
            $table->string('verfikasi_peranan');
            $table->string('verfikasi_dari');
            $table->string('verfikasi_hingga');

            $table->string('type');
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('configurations');
    }
};
