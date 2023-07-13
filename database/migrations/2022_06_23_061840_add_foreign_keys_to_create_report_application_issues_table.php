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
        Schema::table('report_application_issues', function (Blueprint $table) {
            $table->foreign('report_application_id')->references(['id'])->on('report_application')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('report_application_issues', function (Blueprint $table) {
            $table->dropForeign(['report_application_id']);
        });
    }
};
