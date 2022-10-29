<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountDownGroups extends Model
{
    use HasFactory;
    protected $fillable = [
        'count_down_id',
        'user_group_id',
        'show_at'
    ];

    public function countDown()
    {
        return $this->belongsTo(CountDown::class);
    }

    public function userGroup()
    {
        return $this->belongsTo(UserGroup::class);
    }

    public function getExpireAtAttribute()
    {
        return $this->countDown->expire_at;
    }

    public function getExpiredAttribute()
    {
        return (strtotime($this->expire_at) < time());
    }

    public function getShowAtInHourAttribute()
    {
        $now = Carbon::now();
        $target = Carbon::parse($this->show_at);
        return (strtotime($this->show_at) > time()) ? $now->diff($target)->format('%H') : 0;
    }
    public function getShowAtInMinuteAttribute()
    {
        $now = Carbon::now();
        $target = Carbon::parse($this->show_at);
        return (strtotime($this->show_at) > time()) ? $now->diff($target)->format('%I') : 0;
    }
    public function getShowAtInSecondAttribute()
    {
        $now = Carbon::now();
        $target = Carbon::parse($this->show_at);
        return (strtotime($this->show_at) > time()) ? $now->diff($target)->format('%S') : 0;
    }

}
