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
                if(!$count_down->showed)
                {
                    $count_down_expire = $count_down->difference_time;
                    if(Carbon::parse($count_down->start_at)->diffInSeconds() < 60)
                    {
                        $telegram_users = TelegramUser::all();
                        foreach ($telegram_users as $telegram_user)
                        {
                            $this->sendMessage($telegram_user->user_id,"New countdown just got started, never miss a pump");
                        }
                    }
                    if($count_down_expire['h'] == "04" && $count_down_expire['m'] == "00")
                    {
                        $telegram_users = TelegramUser::all();
                        foreach ($telegram_users as $telegram_user)
                        {
                            $this->sendMessage($telegram_user->user_id,"4 hours left to our huge pump 🚀");
                        }
                    }
                    if($count_down_expire['h'] == "03" && $count_down_expire['m'] == "00")
                    {
                        $telegram_users = TelegramUser::all();
                        foreach ($telegram_users as $telegram_user)
                        {
                            $this->sendMessage($telegram_user->user_id,"3 hours left to our huge pump 🚀");
                        }
                    }
                    if($count_down_expire['h'] == "02" && $count_down_expire['m'] == "00")
                    {
                        $telegram_users = TelegramUser::all();
                        foreach ($telegram_users as $telegram_user)
                        {
                            $this->sendMessage($telegram_user->user_id,"2 hours left to our huge pump 🚀");
                        }
                    }
                    if($count_down_expire['h'] == "01" && $count_down_expire['m'] == "00")
                    {
                        $telegram_users = TelegramUser::all();
                        foreach ($telegram_users as $telegram_user)
                        {
                            $this->sendMessage($telegram_user->user_id,"1 hours left to our huge pump 🚀");
                        }
                    }
                    if($count_down_expire['h'] == "00" && $count_down_expire['m'] == "30")
                    {
                        $telegram_users = TelegramUser::all();
                        foreach ($telegram_users as $telegram_user)
                        {
                            $this->sendMessage($telegram_user->user_id,"About 30 minutes left to our huge pump 🚀");
                        }
                    }
                    if($count_down_expire['h'] == "00" && $count_down_expire['m'] == "15")
                    {
                        $telegram_users = TelegramUser::all();
                        foreach ($telegram_users as $telegram_user)
                        {
                            $this->sendMessage($telegram_user->user_id,"About 15 minutes left to our huge pump 🚀");
                        }
                    }
                    if($count_down_expire['h'] == "00" && $count_down_expire['m'] == "5")
                    {
                        $telegram_users = TelegramUser::all();
                        foreach ($telegram_users as $telegram_user)
                        {
                            $this->sendMessage($telegram_user->user_id,"About 5 minutes left to our huge pump 🚀");
                        }
                    }
                    if($count_down_expire['h'] == "00" && $count_down_expire['m'] == "1")
                    {
                        $telegram_users = TelegramUser::all();
                        foreach ($telegram_users as $telegram_user)
                        {
                            $this->sendMessage($telegram_user->user_id,"Only 1 minute left to our huge pump check the website now !!! 🚀\nWhalepumpers.com");
                        }
                    }
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
