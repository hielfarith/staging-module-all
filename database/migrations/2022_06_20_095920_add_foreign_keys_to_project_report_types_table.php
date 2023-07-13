<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProjectReportTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_report_types', function (Blueprint $table) {
            $table->foreign(['master_report_type_id'], 'fk_project_report_types_master_report_type1')->references(['id'])->on('master_report_type')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['projects_id'], 'fk_project_report_types_projects1')->references(['id'])->on('projects')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_report_types', function (Blueprint $table) {
            $table->dropForeign('fk_project_report_types_master_report_type1');
            $table->dropForeign('fk_project_report_types_projects1');
        });
    }
}
