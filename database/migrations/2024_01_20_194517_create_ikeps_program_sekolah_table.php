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
        Schema::create('ikeps_program_sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('tahun');
            $table->string('kod_sekolah');

            $table->boolean('sukan_tahunan');
            $table->integer('sukan_tahunan_kekerapan')->nullable();
            $table->integer('sukan_tahunan_perlaksanaan')->nullable();

            $table->boolean('merentas_desa');
            $table->integer('merentas_desa_kekerapan')->nullable();
            $table->integer('merentas_desa_perlaksanaan')->nullable();

            $table->boolean('sukantara');
            $table->integer('sukantara_kekerapan')->nullable();
            $table->integer('sukantara_perlaksanaan')->nullable();

            $table->boolean('sukan_tahap_1');
            $table->integer('sukan_tahap_1_kekerapan')->nullable();
            $table->integer('sukan_tahap_1_perlaksanaan')->nullable();

            $table->boolean('sukan_pendidikan_khas');
            $table->integer('sukan_pendidikan_khas_kekerapan')->nullable();
            $table->integer('sukan_pendidikan_khas_perlaksanaan')->nullable();

            $table->boolean('program_sukan');
            $table->integer('program_sukan_kekerapan')->nullable();
            $table->integer('program_sukan_perlaksanaan')->nullable();
            
            $table->boolean('anugerah_sukan');
            $table->integer('anugerah_sukan_kekerapan')->nullable();
            $table->integer('anugerah_sukan_perlaksanaan')->nullable();

            $table->boolean('sukan_antara_rumah');
            $table->integer('sukan_antara_rumah_kekerapan')->nullable();
            $table->integer('sukan_antara_rumah_perlaksanaan')->nullable();

            $table->boolean('sukan_antara_kelas');
            $table->integer('sukan_antara_kelas_kekerapan')->nullable();
            $table->integer('sukan_antara_kelas_perlaksanaan')->nullable();

            $table->boolean('sukan_antara_unit');
            $table->integer('sukan_antara_unit_kekerapan')->nullable();
            $table->integer('sukan_antara_unit_perlaksanaan')->nullable();
            
            $table->boolean('perlawanan_persahabatan');
            $table->integer('perlawanan_persahabatan_kekerapan')->nullable();
            $table->integer('perlawanan_persahabatan_perlaksanaan')->nullable();

            $table->boolean('sukan_mini');
            $table->integer('sukan_mini_kekerapan')->nullable();
            $table->integer('sukan_mini_perlaksanaan')->nullable();

            $table->boolean('sukan_prasekolah');
            $table->integer('sukan_prasekolah_kekerapan')->nullable();
            $table->integer('sukan_prasekolah_perlaksanaan')->nullable();

            $table->boolean('klinik_sukan');
            $table->integer('klinik_sukan_kekerapan')->nullable();
            $table->integer('klinik_sukan_perlaksanaan')->nullable();

            $table->boolean('hari_sukan');
            $table->integer('hari_sukan_kekerapan')->nullable();
            $table->integer('hari_sukan_perlaksanaan')->nullable();
                        
            $table->boolean('lain');
            $table->string('lain_butiran')->nullable();
            $table->integer('lain_kekerapan')->nullable();
            $table->integer('lain_perlaksanaan')->nullable();
            
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
        Schema::dropIfExists('ikeps_program_sekolah');
    }
};
