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
        Schema::table('skpak_standard_penilaians', function (Blueprint $table) {
            $table->integer('nama_taska');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skpak_standard_penilaians', function (Blueprint $table) {
            $table->dropColumn('nama_taska');
        });
    }
};
