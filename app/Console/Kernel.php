<?php

namespace App\Console;

use App\Console\Commands\Install;
use App\Models\CountDown;
use App\Models\TelegramUser;
use App\Traits\Telegram;
use Carbon\Carbon;
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
            $active_count_downs = CountDown::query()->notExpired()->whereDate('start_at','=',Carbon::now())->get();
            foreach ($active_count_downs as $count_down)
            {
                $count_down_expire = $count_down->difference_time;
                $telegram_users = TelegramUser::all();
                foreach ($telegram_users as $telegram_user)
                {
                    $this->sendMessage($telegram_user->user_id,"Only ".$count_down_expire['h']." hours and ".$count_down_expire['m']." minute to start special count down!!!");
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
