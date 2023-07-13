<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserProjectRoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_project_role')->delete();
        
        \DB::table('user_project_role')->insert(array (
            0 => 
            array (
                'id' => 1,
                'users_id' => 13,
                'projects_id' => 1,
                'master_project_role_id' => 1,
                'created_at' => '2022-07-13 12:26:15',
                'updated_at' => '2022-07-13 12:26:15',
            ),
            1 => 
            array (
                'id' => 2,
                'users_id' => 14,
                'projects_id' => 1,
                'master_project_role_id' => 1,
                'created_at' => '2022-07-13 12:26:26',
                'updated_at' => '2022-07-13 12:26:26',
            ),
            2 => 
            array (
                'id' => 3,
                'users_id' => 23,
                'projects_id' => 1,
                'master_project_role_id' => 4,
                'created_at' => '2022-07-13 12:26:43',
                'updated_at' => '2022-07-13 12:26:43',
            ),
            3 => 
            array (
                'id' => 4,
                'users_id' => 15,
                'projects_id' => 1,
                'master_project_role_id' => 3,
                'created_at' => '2022-07-13 12:26:54',
                'updated_at' => '2022-07-13 12:26:54',
            ),
            4 => 
            array (
                'id' => 5,
                'users_id' => 18,
                'projects_id' => 1,
                'master_project_role_id' => 4,
                'created_at' => '2022-07-13 12:27:07',
                'updated_at' => '2022-07-13 12:27:07',
            ),
            5 => 
            array (
                'id' => 6,
                'users_id' => 26,
                'projects_id' => 1,
                'master_project_role_id' => 4,
                'created_at' => '2022-07-13 12:27:25',
                'updated_at' => '2022-07-13 12:27:25',
            ),
            6 => 
            array (
                'id' => 7,
                'users_id' => 14,
                'projects_id' => 2,
                'master_project_role_id' => 1,
                'created_at' => '2022-07-13 12:28:49',
                'updated_at' => '2022-07-13 12:28:49',
            ),
            7 => 
            array (
                'id' => 8,
                'users_id' => 15,
                'projects_id' => 2,
                'master_project_role_id' => 3,
                'created_at' => '2022-07-13 12:29:00',
                'updated_at' => '2022-07-13 12:29:00',
            ),
            8 => 
            array (
                'id' => 9,
                'users_id' => 19,
                'projects_id' => 2,
                'master_project_role_id' => 4,
                'created_at' => '2022-07-13 12:29:16',
                'updated_at' => '2022-07-13 12:29:16',
            ),
            9 => 
            array (
                'id' => 10,
                'users_id' => 27,
                'projects_id' => 2,
                'master_project_role_id' => 4,
                'created_at' => '2022-07-13 12:29:30',
                'updated_at' => '2022-07-13 12:29:30',
            ),
        ));
        
        
    }
}