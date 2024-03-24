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
        Schema::create('skips_butiran_institusi_sekolahs', function (Blueprint $table) {
            $table->id();
            $table->string('kod_sekolah');
            $table->string('nama_institusi');
            $table->string('alamat');
            $table->string('alamat2')->nullable();
            $table->string('alamat3')->nullable();
            $table->string('negeri');
            $table->string('daerah')->nullable();
            $table->string('poskod')->nullable();
            $table->string('bandar')->nullable();
            $table->string('no_telephone');
            $table->string('email');
            $table->string('jenis_perakuan_pendaftaran');
            $table->string('tarikh_tamat');
            $table->string('nama_syarikat');
            $table->string('no_pendaftaran_syarikat');
            $table->string('tarikh_audit_laporan_kewangan');
            $table->string('tarikh_pengesahan_laporan_kewangan');
            $table->longText('guru')->nullable();
            $table->longText('pelajar')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('skips_butiran_institusi_sekolahs');
    }
};
