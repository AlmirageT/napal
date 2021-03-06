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
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call('App\Http\Controllers\MensajeriaController@correoUsuariosQueNoHanInvertido')->weeklyOn(1,'13:00');
        $schedule->call('App\Http\Controllers\MensajeriaController@corrreoUsuariosQueHanInvertido')->weeklyOn(1,'13:00');
        $schedule->call('App\Http\Controllers\SaldoDisponibleController@reversarEstadoDeNoPagados')->dailyAt('13:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
