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
        Schema::create('skips_butiran_institusi_pusat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_institusi');
            $table->string('nama_pengurus');
            $table->string('nama_pengerusi');
            $table->string('alamat');
            $table->string('alamat2')->nullable();
            $table->string('alamat3')->nullable();
            $table->string('negeri');
            $table->string('daerah')->nullable();
            $table->string('poskod')->nullable();
            $table->string('no_telephone');
            $table->string('fax');
            $table->string('email');
            $table->string('laman_web');
            $table->string('mempunyai_surat_kelulusan_kdn');
            $table->string('no_surat_kelulusan_kdn')->nullable();
            $table->string('tarikh_tamat_kelulusan_kdn')->nullable();
            $table->string('no_perakuan_pendaftaran');
            $table->string('no_pendaftaran_syarikat');
            $table->string('tarikh_tamat_perakuan_pendaftaran');
            $table->string('no_lesen_perniagaan');
            $table->string('mempunyai_audit_kewangan');
            $table->string('mempunyai_laporan_audit');
            $table->longText('butiran_guru')->nullable();
            $table->longText('butiran_pelajar')->nullable();
             $table->string('tarikh_audit')->nullable();
            $table->string('tarikh_lapor')->nullable();
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
        Schema::dropIfExists('skips_butiran_institusi_pusat');
    }
};
