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
        Schema::table('role_access', function (Blueprint $table) {
            $table->string('sub_modul')->after('modul');
            $table->dropColumn('proses');
            $table->dropColumn('capaian');
            $table->string('jenis')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role_access', function (Blueprint $table) {
            $table->dropColumn('sub_modul');
            $table->integer('proses');
            $table->integer('capaian');
            $table->integer('jenis')->change();
        });
    }
};
