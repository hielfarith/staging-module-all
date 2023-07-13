<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrsCheckVerifyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urs_check_verify', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('urs_id')->index('urs_check_verify_FK_urs');
            $table->integer('type')->default(1)->comment('1=Checker, 2=Verifier');
            $table->string('name')->nullable();
            $table->string('position')->nullable();
            $table->string('signature')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('urs_check_verify');
    }
}
