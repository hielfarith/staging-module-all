<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectReportTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('project_report_types')->delete();
        
        \DB::table('project_report_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'projects_id' => 1,
                'master_report_type_id' => 1,
                'created_at' => '2022-06-27 18:25:42',
                'updated_at' => '2022-06-27 18:25:45',
            ),
            1 => 
            array (
                'id' => 2,
                'projects_id' => 1,
                'master_report_type_id' => 2,
                'created_at' => '2022-06-27 18:25:42',
                'updated_at' => '2022-06-27 18:25:45',
            ),
            2 => 
            array (
                'id' => 3,
                'projects_id' => 1,
                'master_report_type_id' => 3,
                'created_at' => '2022-06-27 18:25:42',
                'updated_at' => '2022-06-27 18:25:45',
            ),
            3 => 
            array (
                'id' => 4,
                'projects_id' => 2,
                'master_report_type_id' => 1,
                'created_at' => '2022-07-13 12:29:44',
                'updated_at' => '2022-07-13 12:29:44',
            ),
            4 => 
            array (
                'id' => 5,
                'projects_id' => 2,
                'master_report_type_id' => 2,
                'created_at' => '2022-07-13 12:29:44',
                'updated_at' => '2022-07-13 12:29:44',
            ),
            5 => 
            array (
                'id' => 6,
                'projects_id' => 2,
                'master_report_type_id' => 3,
                'created_at' => '2022-07-13 12:29:44',
                'updated_at' => '2022-07-13 12:29:44',
            ),
        ));
        
        
    }
}