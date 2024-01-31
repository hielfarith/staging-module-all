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
        Schema::table('butiran_pemeriksaan_skips', function (Blueprint $table) {
            $table->integer('instrumen_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('butiran_pemeriksaan_skips', function (Blueprint $table) {
            $table->dropColumn('instrumen_id');
        });
    }
};
