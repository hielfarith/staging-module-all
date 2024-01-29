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
        Schema::table('item_standard_quality_skips', function (Blueprint $table) {
            $table->text('penubuhan_pendaftaran_verfikasi')->nullable();
            $table->text('pengurusan_institusi_verfikasi')->nullable();
            $table->text('pengurusan_kurikulum_verfikasi')->nullable();
            $table->text('pengajaran_verfikasi')->nullable();
            $table->text('pengurusan_penilaian_verfikasi')->nullable();
            $table->text('pengurusan_pembangunan_guru_verfikasi')->nullable();
            $table->text('displin_verfikasi')->nullable();
            $table->text('piawaian_verfikasi')->nullable();
            $table->text('kebersihan_verfikasi')->nullable();
            $table->text('pengurusan_pelajar_antarabangsa_verfikasi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_standard_quality_skips', function (Blueprint $table) {
            $table->dropColumn('penubuhan_pendaftaran_verfikasi')->nullable();
            $table->dropColumn('pengurusan_institusi_verfikasi')->nullable();
            $table->dropColumn('pengurusan_kurikulum_verfikasi')->nullable();
            $table->dropColumn('pengajaran_verfikasi')->nullable();
            $table->dropColumn('pengurusan_penilaian_verfikasi')->nullable();
            $table->dropColumn('pengurusan_pembangunan_guru_verfikasi')->nullable();
            $table->dropColumn('displin_verfikasi')->nullable();
            $table->dropColumn('piawaian_verfikasi')->nullable();
            $table->dropColumn('kebersihan_verfikasi')->nullable();
            $table->dropColumn('pengurusan_pelajar_antarabangsa_verfikasi')->nullable();
        });
    }
};
