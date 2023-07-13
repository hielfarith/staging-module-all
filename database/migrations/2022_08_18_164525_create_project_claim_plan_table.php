<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectClaimPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_claim_plan', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('project_id')->index('project_claim_plan_FK_project');
            $table->text('claim_plan_desc')->nullable();
            $table->date('claim_plan_date')->nullable();
            $table->text('claim_plan_detail')->nullable();
            $table->decimal('claim_plan_monthly', 10)->nullable()->default(0);
            $table->decimal('claim_plan_other', 10)->nullable()->default(0);
            $table->decimal('claim_plan_total', 10)->nullable()->default(0);
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
        Schema::dropIfExists('project_claim_plan');
    }
}
