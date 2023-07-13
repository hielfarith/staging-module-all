<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProjectClaimPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_claim_plan', function (Blueprint $table) {
            $table->foreign(['project_id'], 'project_claim_plan_FK_project')->references(['id'])->on('projects')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_claim_plan', function (Blueprint $table) {
            $table->dropForeign('project_claim_plan_FK_project');
        });
    }
}
