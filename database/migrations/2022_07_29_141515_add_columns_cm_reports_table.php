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
        Schema::table('cm_reports', function (Blueprint $table) {
            $table->string('staff_phone_no')->nullable()->after('staff_role');
            $table->string('staff_email')->nullable()->after('staff_phone_no');

            $table->string('staff2_name')->nullable()->after('staff_email');
            $table->string('staff2_role')->nullable()->after('staff2_name');
            $table->string('staff2_phone_no')->nullable()->after('staff2_role');
            $table->string('staff2_email')->nullable()->after('staff2_phone_no');

            $table->string('staff2_signature')->nullable()->after('signature_date');
            $table->date('signature2_date')->nullable()->after('staff2_signature');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cm_reports', function (Blueprint $table) {
            $table->dropColumn('staff_phone_no');
            $table->dropColumn('staff_email');
            $table->dropColumn('staff2_name');
            $table->dropColumn('staff2_role');
            $table->dropColumn('staff2_signature');
            $table->dropColumn('signature2_date');
        });
    }
};
