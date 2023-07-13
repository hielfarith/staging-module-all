<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectReportTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_report_types', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('projects_id')->index('fk_project_report_types_projects1_idx');
            $table->integer('master_report_type_id')->index('fk_project_report_types_master_report_type1_idx');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_report_types');
    }
}
