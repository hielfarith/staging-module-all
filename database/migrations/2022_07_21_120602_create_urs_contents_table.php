<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrsContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urs_contents', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('urs_id')->index('urs_contents_FK_urs');
            $table->integer('section_id')->nullable();
            $table->string('section_name')->nullable();
            $table->longText('section_content')->nullable();
            $table->string('section_img')->nullable();
            $table->string('section_img_desc')->nullable();
            $table->integer('is_active')->default(1);
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
        Schema::dropIfExists('urs_contents');
    }
}
