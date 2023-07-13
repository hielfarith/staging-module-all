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
        Schema::table('report_helpdesk_issues', function (Blueprint $table) {
            $table->foreign('report_helpdesk_id')->references(['id'])->on('report_helpdesk')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('master_medium_id')->references(['id'])->on('master_medium')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('report_helpdesk_issues', function (Blueprint $table) {
            $table->dropForeign(['report_helpdesk_id']);
            $table->dropForeign(['master_medium_id']);
        });
    }
};
