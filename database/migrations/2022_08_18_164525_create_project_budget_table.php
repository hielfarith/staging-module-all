<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectBudgetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_budget', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('project_id')->index('project_budget_FK_project');
            $table->text('item_name');
            $table->decimal('tender_price', 10)->nullable()->default(0);
            $table->decimal('contigency', 10)->nullable()->default(0);
            $table->decimal('tax', 10)->nullable()->default(0);
            $table->decimal('base_price', 10)->nullable()->default(0);
            $table->decimal('best_case', 10)->nullable()->default(0);
            $table->decimal('on_par', 10)->nullable()->default(0);
            $table->decimal('worst_case', 10)->nullable()->default(0);
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
        Schema::dropIfExists('project_budget');
    }
}
