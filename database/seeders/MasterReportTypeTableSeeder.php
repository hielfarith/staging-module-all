<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MasterReportTypeTableSeeder extends Seeder
{
     /**
     * Command For This Specifically Seed
     *
     * php artisan db:seed --class="MasterReportTypeTableSeeder"
     */

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');
        \DB::table('master_report_type')->delete();

        \DB::table('master_report_type')->insert(array (
            0 =>
            array (
                'id' => 1,
                'type' => 'Helpdesk Report',
                'route_name' => 'helpdesk',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'type' => 'Attendance Report',
                'route_name' => 'attendance',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'type' => 'Application Report',
                'route_name' => 'application',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'type' => 'Hardware Report',
                'route_name' => 'hardware',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 =>
            array (
                'id' => 5,
                'type' => 'Software Report',
                'route_name' => 'software',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 =>
            array (
                'id' => 6,
                'type' => 'Management Report',
                'route_name' => 'management',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 =>
            array (
                'id' => 7,
                'type' => 'Testing report',
                'route_name' => 'testing',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 =>
            array (
                'id' => 8,
                'type' => 'URS Document',
                'route_name' => 'urs',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 =>
            array (
                'id' => 9,
                'type' => 'Sijil Penghargaan',
                'route_name' => 'sijil',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 =>
            array (
                'id' => 10,
                'type' => 'Database Report',
                'route_name' => 'database',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        \DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
