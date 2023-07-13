<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MasterProjectRoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('master_project_role')->delete();

        \DB::table('master_project_role')->insert(array (
            0 =>
            array (
                'created_at' => NULL,
                'id' => 1,
                'name' => 'Project Manager',
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'created_at' => NULL,
                'id' => 2,
                'name' => 'Project Executive',
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'created_at' => NULL,
                'id' => 3,
                'name' => 'Technical',
                'updated_at' => NULL,
            ),
            3 =>
            array (
                'created_at' => NULL,
                'id' => 4,
                'name' => 'Programmer',
                'updated_at' => NULL,
            ),
            4 =>
            array (
                'created_at' => NULL,
                'id' => 5,
                'name' => 'Resident Engineer',
                'updated_at' => NULL,
            ),
            5 =>
            array (
                'created_at' => NULL,
                'id' => 6,
                'name' => 'Support Service',
                'updated_at' => NULL,
            ),
        ));


    }
}
