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
        if (!Schema::hasTable('timeline')) {
            Schema::create('timeline', function (Blueprint $table) {
                $table->id();
                $table->integer('projects_id');
                $table->integer('timeline_duration_id');
                $table->string('title')->nullable();
                $table->date('start_date')->nullable();
                $table->date('end_date')->nullable();
                $table->integer('duration')->nullable();
                $table->decimal('baseline')->nullable();
                $table->integer('is_pillar')->default(0)->nullable();
                $table->integer('is_sub_item')->default(0)->nullable();
                $table->integer('is_milestone')->default(0)->nullable();
                $table->decimal('actual')->nullable();
                $table->decimal('difference')->nullable();
                $table->integer('status')->nullable();
                $table->timestamps();
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timeline');

    }
};
