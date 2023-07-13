<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectMiscTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_misc', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('project_id')->index('project_misc_FK_projects');
            $table->integer('project_claim_plan_id')->nullable()->index('project_misc_FK_project_claim_plan');
            $table->integer('misc_month');
            $table->date('misc_date');
            $table->integer('master_trans_type_id')->index('project_misc_FK_master_trans_type');
            $table->string('misc_invoice_receipt_no');
            $table->decimal('misc_amount', 10)->default(0);
            $table->unsignedBigInteger('created_by')->index('project_misc_FK_users_create');
            $table->unsignedBigInteger('updated_by')->nullable()->index('project_misc_FK_users_update');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_misc');
    }
}
