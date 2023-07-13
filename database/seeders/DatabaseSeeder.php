<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(MasterFaqTypeSeeder::class);
        $this->call(MasterAnnouncementTypeSeeder::class);
        // $this->call(FaqSeeder::class);
        $this->call(MasterInboxStatusSeeder::class);
        $this->call(NotifyTableSeeder::class);
        $this->call(MasterMonthTableSeeder::class);
        $this->call(MasterCountrySeeder::class);
        $this->call(MasterStateSeeder::class);
        $this->call(MasterHolidayTypeSeeder::class);
        $this->call(MasterMediumTableSeeder::class);
        // $this->call(HolidaySeeder::class);

        $this->call(MasterProjectRoleTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(MasterReportTypeTableSeeder::class);
        $this->call(ProjectReportTypesTableSeeder::class);
        $this->call(ReportApplicationMasterStatusTableSeeder::class);
        $this->call(ReportHelpdeskMasterStatusTableSeeder::class);
        $this->call(UserProjectRoleTableSeeder::class);
        $this->call(ProjectAbbreviationsTableSeeder::class);
        $this->call(ModelHasPermissionsTableSeeder::class);
        $this->call(HolidayTableSeeder::class);
        $this->call(HolidayStateTableSeeder::class);
        $this->call(MasterUrsSectionTableSeeder::class);
        $this->call(MasterTransTypeTableSeeder::class);
        // $this->call(ProjectBudgetTableSeeder::class);
        // $this->call(ProjectTimesheetTableSeeder::class);
        \DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
