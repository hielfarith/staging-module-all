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
        Schema::create('issue_register', function (Blueprint $table) {
            $table->id();
            $table->integer('projects_id');
            $table->date('Registered Date');
            $table->string('Issues');
            $table->string('Action Plan');
            $table->string('Class');
            $table->string('Team');
            $table->date('Target Solved');
            $table->string('Revised Date');
            $table->string('Status');
            $table->foreign('projects_id')->references(['id'])->on('projects');
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
        Schema::dropIfExists('issue_register');
    }
};
