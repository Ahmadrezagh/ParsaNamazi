<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserChestActivity extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'chest_id',
        'activated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chest()
    {
        return $this->belongsTo(Chest::class);
    }

    public static function logActivity($timezone = null)
    {
        $today_in_user_timezone = Carbon::now($timezone);
        $user = auth()->user();
        $active_chests = Chest::query()->active()->get();

        if($timezone && auth()->check() && auth()->user()->isUser())
        {
            foreach ($active_chests as $chest)
            {
                $user_has_activity_today = UserChestActivity::userHasActivityToday($user->id,$chest->id,$today_in_user_timezone);

                if(!$user_has_activity_today  && !$user->hasActiveChest($chest->id))
                {
                    UserChestActivity::registerLog($user->id,$chest->id,$today_in_user_timezone);
                    $user->checkActivityAndGetGift($chest->id);
                }
            }

        }
    }

    public static function userHasActivityToday($user_id,$chest_id,$today_in_user_timezone)
    {
        return UserChestActivity::query()
            ->where('user_id' ,'=', $user_id)
            ->where('chest_id','=',$chest_id)
            ->whereDate('activated_at','=',$today_in_user_timezone)
            ->first();
    }

    public static function registerLog($user_id,$chest_id,$today_in_user_timezone)
    {
        UserChestActivity::checkLatestLogWasYesterdayOrDeletePreviousLogs($user_id,$chest_id,$today_in_user_timezone);
        UserChestActivity::create([
            'user_id' => $user_id,
            'chest_id' => $chest_id,
            'activated_at' => $today_in_user_timezone
        ]);
    }

    public static function checkLatestLogWasYesterdayOrDeletePreviousLogs($user_id,$chest_id,$today_in_user_timezone)
    {
        $date = Carbon::parse($today_in_user_timezone)->addDays(-1);
        $latest_log = UserChestActivity::query()
            ->where('user_id','=',$user_id)
            ->where('chest_id','=',$chest_id)
            ->whereDate('activated_at','=',$date)
            ->first();
        if(!$latest_log)
        {
            UserChestActivity::query()
                ->where('user_id','=',$user_id)
                ->where('chest_id','=',$chest_id)
                ->delete();
        }
    }
}
