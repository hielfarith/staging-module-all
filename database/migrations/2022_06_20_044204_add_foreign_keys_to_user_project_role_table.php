<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUserProjectRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_project_role', function (Blueprint $table) {
            $table->foreign(['master_project_role_id'], 'fk_user_project_role_master_project_role1')->references(['id'])->on('master_project_role')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['users_id'], 'fk_user_project_role_users1')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['projects_id'], 'fk_user_project_role_projects1')->references(['id'])->on('projects')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_project_role', function (Blueprint $table) {
            $table->dropForeign('fk_user_project_role_master_project_role1');
            $table->dropForeign('fk_user_project_role_users1');
            $table->dropForeign('fk_user_project_role_projects1');
        });
    }
}
