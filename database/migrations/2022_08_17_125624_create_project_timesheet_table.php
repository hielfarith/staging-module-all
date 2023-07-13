<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTimesheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_timesheet', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('project_id')->index('project_timesheet_FK_projects');
            $table->unsignedBigInteger('user_id')->index('project_timesheet_FK_users');
            $table->integer('ts_id');
            $table->integer('ts_percentage')->default(0);
            $table->integer('ts_daily_rate')->default(0);
            $table->decimal('cost', 10)->nullable()->default(0);
            $table->date('ts_date');
            $table->integer('ts_week')->nullable();
            $table->integer('ts_year')->nullable();
            $table->dateTime('ts_submitted_at')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_timesheet');
    }
}
