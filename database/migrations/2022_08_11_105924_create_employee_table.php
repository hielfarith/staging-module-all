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
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('nric')->nullable();
            $table->string('email')->nullable();
            $table->string('ctcNumber')->nullable();
            $table->string('age')->nullable();
            $table->string('dob')->nullable();
            $table->string('nationality')->nullable();
            $table->string('race')->nullable();
            $table->string('maritalStatus')->nullable();
            $table->string('religion')->nullable();
            $table->string('address')->nullable();
            $table->string('emgName')->nullable();
            $table->string('emgNumber')->nullable();
            $table->string('emgRelation')->nullable();
            $table->string('emgAddress')->nullable();
            $table->string('bankName')->nullable();
            $table->string('accNumber')->nullable();
            $table->timestamps();
        });

        Schema::dropIfExists('new_employee');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
};
