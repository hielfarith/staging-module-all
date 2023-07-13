<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MasterHolidayTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_holiday_type')->insert([
            'name' => 'Tahun Baru Cina',
        ]);

        DB::table('master_holiday_type')->insert([
            'name' => 'Tahun Baru Cina Hari Kedua',
        ]);

        DB::table('master_holiday_type')->insert([
            'name' => 'Hari Pekerja',
            'start_date' => Carbon::create(date('Y'), 5, 1),
        ]);

        DB::table('master_holiday_type')->insert([
            'name' => 'Hari Wesak',
            'start_date' => Carbon::create(date('Y'), 5, 29),
        ]);

        DB::table('master_holiday_type')->insert([
            'name' => 'Hari Raya Aidilfitri',
        ]);

        DB::table('master_holiday_type')->insert([
            'name' => 'Hari Raya Aidilfitri Hari Kedua',
        ]);

        DB::table('master_holiday_type')->insert([
            'name' => 'Hari Raya Haji',
        ]);

        DB::table('master_holiday_type')->insert([
            'name' => 'Hari Kebangsaan',
            'start_date' => Carbon::create(date('Y'), 8, 31),
        ]);

        DB::table('master_holiday_type')->insert([
            'name' => 'Awal Muharram',
        ]);

        DB::table('master_holiday_type')->insert([
            'name' => 'Hari Malaysia',
            'start_date' => Carbon::create(date('Y'), 9, 16),
        ]);

        DB::table('master_holiday_type')->insert([
            'name' => 'Maulidur Rasul',
        ]);

        DB::table('master_holiday_type')->insert([
            'name' => 'Hari Krismas',
            'start_date' => Carbon::create(date('Y'), 12, 25),
        ]);
    }
}
