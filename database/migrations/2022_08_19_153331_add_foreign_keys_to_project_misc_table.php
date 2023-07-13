<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProjectMiscTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_misc', function (Blueprint $table) {
            $table->foreign(['master_trans_type_id'], 'project_misc_FK_master_trans_type')->references(['id'])->on('master_trans_type')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['project_id'], 'project_misc_FK_projects')->references(['id'])->on('projects')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['project_claim_plan_id'], 'project_misc_FK_project_claim_plan')->references(['id'])->on('project_claim_plan')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['created_by'], 'project_misc_FK_users_create')->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['updated_by'], 'project_misc_FK_users_update')->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_misc', function (Blueprint $table) {
            $table->dropForeign('project_misc_FK_master_trans_type');
            $table->dropForeign('project_misc_FK_projects');
            $table->dropForeign('project_misc_FK_project_claim_plan');
            $table->dropForeign('project_misc_FK_users_create');
            $table->dropForeign('project_misc_FK_users_update');
        });
    }
}
