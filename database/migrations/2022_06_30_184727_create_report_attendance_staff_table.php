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
        Schema::create('report_attendance_staff', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('report_attendance_details_id')->unsigned();
            $table->foreign('report_attendance_details_id')->references('id')->on('report_attendance_details');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('time_in')->nullable();
            $table->string('time_out')->nullable();

            $table->tinyInteger('is_re')->default('0');
            $table->tinyInteger('attended')->default('1');

            $table->text('note')->nullable();
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
        Schema::dropIfExists('report_attendance_staff');
    }
};
