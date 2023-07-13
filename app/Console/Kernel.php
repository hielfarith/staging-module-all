<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('update:project-timesheet')->twiceDaily(0, 12);
        $schedule->command('update:project-timesheet')->weeklyOn(5, '17:00');
        $schedule->command('update:project-timesheet')->weeklyOn(5, '17:30');
        $schedule->command('update:project-timesheet')->weeklyOn(5, '18:00');
        $schedule->command('update:project-timesheet')->weeklyOn(5, '18:30');
        $schedule->command('update:project-timesheet')->weeklyOn(5, '19:00');

        $schedule->command('command:generateHelpdeskReportMonthly')->monthlyOn(1, '00:05');
        $schedule->command('command:generateApplicationReportMonthly')->monthlyOn(1, '00:05');
        $schedule->command('command:generateDatabaseReportMonthly')->monthlyOn(1, '00:05');
        $schedule->command('command:generateAttendanceReportMonthly')->monthlyOn(1, '00:01');
        $schedule->command('command:generatePMReport')->monthlyOn(1, '00:10');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
