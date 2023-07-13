<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUrsVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('urs_versions', function (Blueprint $table) {
            $table->foreign(['urs_id'], 'urs_versions_FK_urs')->references(['id'])->on('urs')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('urs_versions', function (Blueprint $table) {
            $table->dropForeign('urs_versions_FK_urs');
        });
    }
}
