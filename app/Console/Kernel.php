<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //\App\Console\Commands\Inspire::class,
        \App\Console\Commands\XMLSitemap::class,
        \App\Console\Commands\YMLYandex::class,
        \App\Console\Commands\Price::class,
        \App\Console\Commands\NpStatus::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('xmlsitemap')->dailyAt('03:00')->sendOutputTo("storage/app/shed_log.txt");
        $schedule->command('umlyandex')->dailyAt('04:00')->sendOutputTo("storage/app/yml_log.txt");
        $schedule->command('price')->dailyAt('04:30');
        $schedule->command('npstatus')->cron('00 08-20 * * 1-6');
    }
}
