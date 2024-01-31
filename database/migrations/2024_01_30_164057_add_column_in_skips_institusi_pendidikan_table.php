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
        Schema::table('skips_institusi_pendidikan', function (Blueprint $table) {
            $table->string('jenis')->nullable()->change();
            $table->string('nama')->nullable()->change();
            $table->text('alamat')->nullable()->change();
            $table->date('tarikh_daftar')->nullable()->change();
            $table->date('tarikh_tamat_daftar')->nullable()->change();
            $table->string('status')->nullable()->change();
            $table->string('no_perakuan')->nullable()->change();
            $table->string('no_tel')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('nama_pengerusi_pengurus')->nullable()->change();
            $table->string('no_kp_pengerusi_pengurus')->nullable()->change();
            $table->string('nama_pengetua_gurubesar')->nullable()->change();
            $table->string('no_kp_pengetua_gurubesar')->nullable()->change();
            $table->after('alamat', function ($table) {
                $table->text('alamat_2')->nullable();
                $table->text('alamat_3')->nullable();
                $table->string('poskod')->nullable();
                $table->string('daerah')->nullable();
                $table->string('negeri')->nullable();
                $table->string('jpn')->nullable();
                $table->string('ppd')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skips_institusi_pendidikan', function (Blueprint $table) {
            $table->string('jenis')->nullable(false)->change();
            $table->string('nama')->nullable(false)->change();
            $table->text('alamat')->nullable(false)->change();
            $table->date('tarikh_daftar')->nullable(false)->change();
            $table->date('tarikh_tamat_daftar')->nullable(false)->change();
            $table->string('status')->nullable(false)->change();
            $table->string('no_perakuan')->nullable(false)->change();
            $table->string('no_tel')->nullable(false)->change();
            $table->string('email')->nullable(false)->change();
            $table->string('nama_pengerusi_pengurus')->nullable(false)->change();
            $table->string('no_kp_pengerusi_pengurus')->nullable(false)->change();
            $table->string('nama_pengetua_gurubesar')->nullable(false)->change();
            $table->string('no_kp_pengetua_gurubesar')->nullable(false)->change();
            $table->dropColumn(['alamat_2', 'alamat_3', 'poskod', 'daerah', 'negeri', 'jpn', 'ppd']);
        });
    }
};
