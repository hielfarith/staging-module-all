<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUrsFunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('urs_functions', function (Blueprint $table) {
            $table->foreign(['urs_id'], 'urs_content_functions_FK_URS')->references(['id'])->on('urs')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('urs_functions', function (Blueprint $table) {
            $table->dropForeign('urs_content_functions_FK_URS');
        });
    }
}
