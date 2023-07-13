<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrsFunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urs_functions', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('urs_id')->index('urs_content_functions_FK_URS');
            $table->integer('func_seq')->default(1);
            $table->string('func_ref')->nullable();
            $table->longText('func_desc')->nullable();
            $table->string('func_img')->nullable();
            $table->string('func_img_desc')->nullable();
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
        Schema::dropIfExists('urs_functions');
    }
}
