<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrsFunctionActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urs_function_activity', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('urs_function_id')->index('urs_function_activity_FK_urs_function');
            $table->integer('activity_seq')->default(1);
            $table->string('activity_ref')->nullable();
            $table->string('activity_name')->nullable();
            $table->text('activity_desc')->nullable();
            $table->text('activity_actor')->nullable();
            $table->text('activity_responsible')->nullable();
            $table->text('activity_frequency')->nullable();
            $table->text('activity_frequency_unit')->nullable();
            $table->text('activity_before')->nullable();
            $table->text('activity_after')->nullable();
            $table->text('activity_method_ops')->nullable();
            $table->text('activity_info_usage')->nullable();
            $table->text('activity_policy')->nullable();
            $table->text('activity_method_alt')->nullable();
            $table->text('activity_quality')->nullable();
            $table->text('activity_extra_note')->nullable();
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
        Schema::dropIfExists('urs_function_activity');
    }
}
