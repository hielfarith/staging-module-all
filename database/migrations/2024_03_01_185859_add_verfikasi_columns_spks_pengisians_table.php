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
        Schema::table('spks_pengisians', function (Blueprint $table) {
            $table->longText('catatan_verfikasi')->nullable();
            $table->longText('penentuan_criticality')->nullable();
            $table->longText('tindakan_ppd')->nullable();
            $table->longText('tindakan_jpn')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('spks_pengisians', function (Blueprint $table) {
            $table->dropColumn(['catatan_verfikasi', 'penentuan_criticality', 'tindakan_ppd','tindakan_jpn']);
        });
    }
};
