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
        Schema::table('butiran_institusi_skips', function (Blueprint $table) {
            $table->integer('institusi_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('butiran_institusi_skips', function (Blueprint $table) {
            $table->dropColumn('institusi_id');
        });
    }
};
