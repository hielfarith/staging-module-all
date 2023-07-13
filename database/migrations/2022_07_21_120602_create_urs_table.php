<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urs', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('project_id')->index('urs_pk_project');
            $table->string('doc_ref')->nullable();
            $table->date('doc_date')->nullable();
            $table->string('doc_version', 10)->nullable()->default('1');
            $table->text('doc_ref_source')->nullable();
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
        Schema::dropIfExists('urs');
    }
}
