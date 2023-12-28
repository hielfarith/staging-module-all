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
        Schema::table('new_forms', function (Blueprint $table) {
            $table->string('description')->nullable();
            $table->integer('id_instrumen')->nullable();
            $table->dateTime('tarikh_didaftar')->nullable();
            $table->dateTime('tarikh_tutup')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('new_forms', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('id_instrumen');
            $table->dropColumn('tarikh_didaftar');
            $table->dropColumn('tarikh_tutup');
        });
    }
};
