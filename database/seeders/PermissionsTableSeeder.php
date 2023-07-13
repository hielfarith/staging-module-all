<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'group' => 'profile',
                'name' => 'profile.update',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => '2022-03-24 14:25:11',
                'updated_at' => '2022-03-24 14:25:14',
            ),
            1 => 
            array (
                'id' => 2,
                'group' => 'admin',
                'name' => 'admin.role',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => '2022-03-24 14:25:51',
                'updated_at' => '2022-03-24 14:25:55',
            ),
            2 => 
            array (
                'id' => 3,
                'group' => 'admin',
                'name' => 'admin.role.view',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => '2022-03-24 14:26:19',
                'updated_at' => '2022-03-24 14:26:22',
            ),
            3 => 
            array (
                'id' => 4,
                'group' => 'admin',
                'name' => 'admin.role.update',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => '2022-03-24 14:26:58',
                'updated_at' => '2022-03-24 14:27:00',
            ),
            4 => 
            array (
                'id' => 5,
                'group' => 'admin',
                'name' => 'admin.role.delete',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => '2022-03-24 14:27:47',
                'updated_at' => '2022-03-24 14:27:49',
            ),
            5 => 
            array (
                'id' => 7,
                'group' => 'admin',
                'name' => 'admin.user',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => '2022-03-24 14:25:51',
                'updated_at' => '2022-03-24 14:25:55',
            ),
            6 => 
            array (
                'id' => 8,
                'group' => 'admin',
                'name' => 'admin.user.view',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => '2022-03-24 14:26:19',
                'updated_at' => '2022-03-24 14:26:22',
            ),
            7 => 
            array (
                'id' => 9,
                'group' => 'admin',
                'name' => 'admin.user.update',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => '2022-03-24 14:26:58',
                'updated_at' => '2022-03-24 14:27:00',
            ),
            8 => 
            array (
                'id' => 10,
                'group' => 'admin',
                'name' => 'admin.user.delete',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => '2022-03-24 14:27:47',
                'updated_at' => '2022-03-24 14:27:49',
            ),
            9 => 
            array (
                'id' => 11,
                'group' => 'admin',
                'name' => 'admin.log',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => '2022-03-28 17:51:29',
                'updated_at' => '2022-03-28 17:51:32',
            ),
            10 => 
            array (
                'id' => 12,
                'group' => 'admin',
                'name' => 'admin.announcement',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => '2022-03-28 17:51:29',
                'updated_at' => '2022-03-28 17:51:32',
            ),
            11 => 
            array (
                'id' => 13,
                'group' => 'admin',
                'name' => 'admin.announcement.view',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => '2022-03-24 14:26:19',
                'updated_at' => '2022-03-24 14:26:22',
            ),
            12 => 
            array (
                'id' => 14,
                'group' => 'admin',
                'name' => 'admin.announcement.update',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => '2022-03-24 14:26:58',
                'updated_at' => '2022-03-24 14:27:00',
            ),
            13 => 
            array (
                'id' => 15,
                'group' => 'admin',
                'name' => 'admin.announcement.delete',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => '2022-03-24 14:27:47',
                'updated_at' => '2022-03-24 14:27:49',
            ),
            14 => 
            array (
                'id' => 16,
                'group' => 'admin',
                'name' => 'admin.faq',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => '2022-03-28 17:51:29',
                'updated_at' => '2022-03-28 17:51:32',
            ),
            15 => 
            array (
                'id' => 17,
                'group' => 'admin',
                'name' => 'admin.faq.view',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => '2022-03-24 14:26:19',
                'updated_at' => '2022-03-24 14:26:22',
            ),
            16 => 
            array (
                'id' => 18,
                'group' => 'admin',
                'name' => 'admin.faq.update',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => '2022-03-24 14:26:58',
                'updated_at' => '2022-03-24 14:27:00',
            ),
            17 => 
            array (
                'id' => 19,
                'group' => 'admin',
                'name' => 'admin.faq.delete',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => '2022-03-24 14:27:47',
                'updated_at' => '2022-03-24 14:27:49',
            ),
            18 => 
            array (
                'id' => 20,
                'group' => 'admin',
                'name' => 'admin.notify',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => '2022-03-28 17:51:29',
                'updated_at' => '2022-03-28 17:51:32',
            ),
            19 => 
            array (
                'id' => 21,
                'group' => 'admin',
                'name' => 'admin.notify.view',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => '2022-03-24 14:26:19',
                'updated_at' => '2022-03-24 14:26:22',
            ),
            20 => 
            array (
                'id' => 22,
                'group' => 'admin',
                'name' => 'admin.notify.update',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => '2022-03-24 14:26:58',
                'updated_at' => '2022-03-24 14:27:00',
            ),
            21 => 
            array (
                'id' => 23,
                'group' => 'admin',
                'name' => 'admin.notify.delete',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => '2022-03-24 14:27:47',
                'updated_at' => '2022-03-24 14:27:49',
            ),
            22 => 
            array (
                'id' => 24,
                'group' => 'admin',
                'name' => 'admin.holiday',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => '2022-03-24 14:27:47',
                'updated_at' => '2022-03-24 14:27:49',
            ),
            23 => 
            array (
                'id' => 26,
                'group' => 'admin',
                'name' => 'admin.project',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 27,
                'group' => 'admin',
                'name' => 'admin.project.delete',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 28,
                'group' => 'admin',
                'name' => 'admin.project.update',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 29,
                'group' => 'admin',
                'name' => 'admin.project.view',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 33,
                'group' => 'admin',
                'name' => 'admin.client',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 34,
                'group' => 'admin',
                'name' => 'admin.client.delete',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 35,
                'group' => 'admin',
                'name' => 'admin.client.update',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 36,
                'group' => 'admin',
                'name' => 'admin.client.view',
                'description' => NULL,
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}