<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMasterUrsSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('master_urs_section', function (Blueprint $table) {
            $table->foreign(['parent_id'], 'master_urs_section_FK_master_urs_section')->references(['id'])->on('master_urs_section')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('master_urs_section', function (Blueprint $table) {
            $table->dropForeign('master_urs_section_FK_master_urs_section');
        });
    }
}
