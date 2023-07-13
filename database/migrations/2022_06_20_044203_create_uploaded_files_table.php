<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadedFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploaded_files', function (Blueprint $table) {
            $table->char('id', 36)->unique();
            $table->string('entity_type', 100);
            $table->string('doc_type', 191)->nullable();
            $table->string('path', 191);
            $table->unsignedBigInteger('borang_id');
            $table->unsignedBigInteger('uploaded_by')->index('uploaded_files_uploaded_by_foreign');
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
        Schema::dropIfExists('uploaded_files');
    }
}
