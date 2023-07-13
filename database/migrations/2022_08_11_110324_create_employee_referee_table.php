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
        Schema::create('employee_referee', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employee')->onUpdate('cascade')->onDelete('cascade');
            $table->string('refereeName')->nullable();
            $table->string('refereeCtc')->nullable();
            $table->string('refereeJob')->nullable();
            $table->string('refereeWork')->nullable();
            $table->timestamps();
        });

        Schema::dropIfExists('new_employee_referee');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_referee');
    }
};
