<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProjectRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_project_role', function (Blueprint $table) {
            $table->integer('id', true);
            $table->unsignedBigInteger('users_id')->index('fk_user_project_role_users1_idx');
            $table->integer('projects_id')->index('fk_user_project_role_projects1_idx');
            $table->integer('master_project_role_id')->nullable()->index('fk_user_project_role_master_project_role1_idx');
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
        Schema::dropIfExists('user_project_role');
    }
}
