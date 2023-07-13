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
        Schema::create('report_attendances', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->text('title')->nullable();
            $table->tinyInteger('status')->default('0');

            $table->integer('week')->nullable();
            $table->integer('month')->nullable();
            $table->integer('year')->nullable();

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->string('prepared_by_name')->nullable();
            $table->string('confirmed_by_name')->nullable();
            $table->string('prepared_by_role')->nullable();
            $table->string('confirmed_by_role')->nullable();

            $table->string('prepared_sign_id')->nullable();
            $table->string('confirmed_sign_id')->nullable();
            $table->foreign('prepared_sign_id')->references('id')->on('uploaded_files');
            $table->foreign('confirmed_sign_id')->references('id')->on('uploaded_files');

            $table->date('prepared_date')->nullable();
            $table->date('confirmed_date')->nullable();
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

        Schema::dropIfExists('report_attendances');
    }
};
