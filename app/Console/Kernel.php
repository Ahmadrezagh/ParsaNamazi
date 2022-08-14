<?php

namespace App\Console;

use App\Console\Commands\Install;
use App\Models\CountDown;
use App\Models\TelegramUser;
use App\Traits\Telegram;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    use Telegram;
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function(){
            $active_count_downs = CountDown::query()->notExpired()->get();
            foreach ($active_count_downs as $count_down)
            {
                $count_down_expire = $count_down->DifferenceTime;
                $telegram_users = TelegramUser::all();
                foreach ($telegram_users as $telegram_user)
                {
                    $this->sendMessage($telegram_user->user_id,$count_down_expire);
                }
            }
        })->everyMinute();
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
