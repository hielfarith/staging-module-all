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
        Schema::create('api_helpdesk_issues', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->string('api_id')->nullable();

            $table->integer('month')->nullable();
			$table->integer('year')->nullable();
            $table->string('title')->nullable();
            $table->text('explanation')->nullable();
            $table->datetime('date_issued')->nullable();
            $table->integer('category')->nullable();
            $table->integer('medium')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api_helpdesk_issues');
    }
};
