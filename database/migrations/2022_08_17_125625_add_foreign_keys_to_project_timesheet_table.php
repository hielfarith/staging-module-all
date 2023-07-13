<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProjectTimesheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_timesheet', function (Blueprint $table) {
            $table->foreign(['project_id'], 'project_timesheet_FK_projects')->references(['id'])->on('projects')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['user_id'], 'project_timesheet_FK_users')->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_timesheet', function (Blueprint $table) {
            $table->dropForeign('project_timesheet_FK_projects');
            $table->dropForeign('project_timesheet_FK_users');
        });
    }
}
