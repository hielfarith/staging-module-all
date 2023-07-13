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
        Schema::create('cm_reports', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('project_id')->nullable();
            $table->foreign('project_id')->references('id')->on('projects');

            $table->bigInteger('server_checklist_id')->unsigned();
            $table->foreign('server_checklist_id')->references('id')->on('pm_server_checklists');

            $table->date('date_reported')->nullable();
            $table->string('time_reported')->nullable();

            $table->string('staff_name')->nullable();
            $table->string('staff_role')->nullable();

            $table->string('staff_signature')->nullable();
            $table->date('signature_date')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('cm_reports');
    }
};
