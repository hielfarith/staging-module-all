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
        Schema::table('api_helpdesk_issues', function (Blueprint $table) {
            $table->string('tracking_id')->nullable()->after('medium');
            $table->string('nama_pengguna')->nullable()->after('tracking_id');
            $table->string('issue_group')->nullable()->after('nama_pengguna');
            $table->datetime('date_response')->nullable()->after('issue_group');
            $table->datetime('date_completed')->nullable()->after('date_response');
            $table->text('action')->nullable()->after('date_completed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('api_helpdesk_issues', function (Blueprint $table) {
            $table->dropColumn('tracking_id');
            $table->dropColumn('nama_pengguna');
            $table->dropColumn('issue_group');
            $table->dropColumn('date_response');
            $table->dropColumn('date_completed');
            $table->dropColumn('action');
        });
    }
};
