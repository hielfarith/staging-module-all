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
        Schema::table('instrumen_skpak_spks_ikep', function (Blueprint $table) {
            $table->string('kategori')->nullable();
            $table->string('jenis_ips')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instrumen_skpak_spks_ikep', function (Blueprint $table) {
            $table->dropColumn('kategori');
            $table->dropColumn('jenis_ips');
        });
    }
};
