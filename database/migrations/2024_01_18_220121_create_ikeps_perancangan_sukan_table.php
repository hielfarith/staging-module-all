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
        Schema::create('ikeps_perancangan_sukan', function (Blueprint $table) {
            $table->id();
            $table->string('tahun');
            $table->string('kod_sekolah');

            $table->boolean('sukan_utama');
            $table->integer('sukan_utama_butiran')->nullable();
            $table->integer('sukan_utama_program')->nullable();

            $table->boolean('inisiatif_sekolah');
            $table->integer('inisiatif_sekolah_butiran')->nullable();
            $table->integer('inisiatif_sekolah_program')->nullable();

            $table->boolean('projek_msn');
            $table->integer('projek_msn_butiran')->nullable();
            $table->integer('projek_msn_program')->nullable();

            $table->boolean('projek_kpm');
            $table->integer('projek_kpm_butiran')->nullable();
            $table->integer('projek_kpm_program')->nullable();

            $table->boolean('ladap');
            $table->integer('ladap_butiran')->nullable();
            $table->integer('ladap_program')->nullable();

            $table->boolean('pengurusan_sukan');
            $table->integer('pengurusan_sukan_butiran')->nullable();

            $table->boolean('kejurulatihan');
            $table->integer('kejurulatihan_butiran')->nullable();
            
            $table->boolean('kepegawaian');
            $table->integer('kepegawaian_butiran')->nullable();
            
            $table->boolean('sains_sukan');
            $table->integer('sains_sukan_butiran')->nullable();

            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('ikeps_perancangan_sukan');
    }
};
