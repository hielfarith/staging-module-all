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
            $table->string('validasi_oleh')->nullable(true)->change();
            $table->string('tempoh_validasi')->nullable(true)->change();
            $table->string('tempoh_validasi_lain')->nullable(true)->change();
            $table->string('perakuan_oleh')->nullable(true)->change();
            $table->string('tempoh_perakuan')->nullable(true)->change();
            $table->string('tempoh_perakuan_lain')->nullable(true)->change();
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
            $table->string('validasi_oleh')->nullable(false)->change();
            $table->string('tempoh_validasi')->nullable(false)->change();
            $table->string('tempoh_validasi_lain')->nullable(false)->change();
            $table->string('perakuan_oleh')->nullable(false)->change();
            $table->string('tempoh_perakuan')->nullable(false)->change();
            $table->string('tempoh_perakuan_lain')->nullable(false)->change();
        });
    }
};
