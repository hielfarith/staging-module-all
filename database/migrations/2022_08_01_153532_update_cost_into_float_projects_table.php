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
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('project_cost');
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->decimal('project_cost',15,2)->nullable()->after('end_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('project_cost');
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->string('project_cost')->nullable()->after('end_date');
        });
    }
};
