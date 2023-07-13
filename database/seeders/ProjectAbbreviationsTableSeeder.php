<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectAbbreviationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('project_abbreviations')->delete();
        
        \DB::table('project_abbreviations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'project_id' => 1,
                'abbreviation' => 'sadasd',
                'description' => 'sdasdas',
                'created_at' => '2022-07-13 12:25:55',
                'updated_at' => '2022-07-13 12:25:55',
            ),
            1 => 
            array (
                'id' => 2,
                'project_id' => 2,
                'abbreviation' => 'JKDM',
                'description' => 'Jabatan Kastam Diraja Malaysia',
                'created_at' => '2022-07-13 12:34:32',
                'updated_at' => '2022-07-13 12:34:32',
            ),
            2 => 
            array (
                'id' => 3,
                'project_id' => 2,
                'abbreviation' => 'FRP',
                'description' => 'Foreign Registered Provider',
                'created_at' => '2022-07-13 12:34:59',
                'updated_at' => '2022-07-13 12:34:59',
            ),
            3 => 
            array (
                'id' => 4,
                'project_id' => 2,
                'abbreviation' => 'TP',
                'description' => 'Taxable Period',
                'created_at' => '2022-07-13 12:35:39',
                'updated_at' => '2022-07-13 12:35:39',
            ),
            4 => 
            array (
                'id' => 5,
                'project_id' => 2,
                'abbreviation' => 'RMCD',
                'description' => 'Royal Malaysia Customs Deparments',
                'created_at' => '2022-07-13 12:36:12',
                'updated_at' => '2022-07-13 12:36:12',
            ),
            5 => 
            array (
                'id' => 6,
                'project_id' => 2,
                'abbreviation' => 'BOD',
                'description' => 'Bill of Demand',
                'created_at' => '2022-07-13 12:36:26',
                'updated_at' => '2022-07-13 12:36:26',
            ),
        ));
        
        
    }
}