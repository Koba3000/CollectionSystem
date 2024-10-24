<?php
namespace App\Console;

use App\Console\Commands\AssignPoints;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        AssignPoints::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('assign:points');
    }
}
