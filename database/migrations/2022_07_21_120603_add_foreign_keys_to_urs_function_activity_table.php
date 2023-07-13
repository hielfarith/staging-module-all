<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUrsFunctionActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('urs_function_activity', function (Blueprint $table) {
            $table->foreign(['urs_function_id'], 'urs_function_activity_FK_urs_function')->references(['id'])->on('urs_functions')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('urs_function_activity', function (Blueprint $table) {
            $table->dropForeign('urs_function_activity_FK_urs_function');
        });
    }
}
