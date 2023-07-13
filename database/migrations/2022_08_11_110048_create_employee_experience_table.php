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
        Schema::create('employee_job_experience', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employee')->onUpdate('cascade')->onDelete('cascade');
            $table->string('position')->nullable();
            $table->string('compName')->nullable();
            $table->string('compNumber')->nullable();
            $table->string('businessType')->nullable();
            $table->date('startDate')->nullable();
            $table->date('endDate')->nullable();
            $table->string('startSalary')->nullable();
            $table->string('endSalary')->nullable();
            $table->string('annLeaves')->nullable();
            $table->string('remuneration')->nullable();
            $table->string('reasonLeaving')->nullable();
            $table->timestamps();
        });

        Schema::dropIfExists('new_employee_job_experience');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_experience');
    }
};
