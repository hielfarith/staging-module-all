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
        Schema::create('pengerusi_pengetua_gurus', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_kp');
            $table->string('no_tel');
            $table->string('email');
            $table->string('jawatan');
            $table->string('negeri');
            $table->string('institusi');
            $table->string('sebab_pertukaran');
            $table->string('sebab_pertukaran_lain')->nullable();
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
        Schema::dropIfExists('pengerusi_pengetua_gurus');
    }
};
