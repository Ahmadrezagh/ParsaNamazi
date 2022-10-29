<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountDown extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'start_at',
        'expire_at'
    ];

    protected $with = [
        'countDownGroups'
    ];

    public function countDownGroups()
    {
        return $this->hasMany(CountDownGroups::class);
    }

    public function getExpiredAttribute()
    {
        return (strtotime($this->expire_at) < time());
    }

    public function scopeNotExpired(Builder $query)
    {
        $date = Carbon::now()->format('Y-m-d');
        $time = Carbon::now()->toTimeString();
        return $query
            ->whereDate('expire_at','=',Carbon::now())
            ->whereTime('expire_at','>=',Carbon::now())
            ->orWhereDate('expire_at','>',Carbon::now());
    }

    public function scopeStarted(Builder $query)
    {
        $date = Carbon::now()->format('Y-m-d');
        $time = Carbon::now()->toTimeString();
        return $query
            ->whereDate('start_at','=',Carbon::now())
            ->whereTime('start_at','<=',Carbon::now())
            ->orWhereDate('start_at','<',Carbon::now());
    }

    public function getShowForUserAttribute()
    {
        $user_group = auth()->user()->user_group;
        if($user_group)
        {
            return $this->countDownGroups()->where('user_group_id','=',$user_group->id)->first();
        }
        return null;
    }

    public function getFirstShowAttribute()
    {
        return $this->countDownGroups()->first();
    }
    public function getShowedAttribute()
    {
        if($this->first_show)
        {
           return (strtotime($this->countDownGroups()->first()->show_at)) < time();
        }
        return true;
    }

    public function getDifferenceTimeAttribute()
    {
        $now = Carbon::now();
        $start_at =  Carbon::parse($this->first_show->show_at);
        $difference = [];
        $difference['h'] = $now->diff($start_at)->format('%H');
        $difference['m'] = $now->diff($start_at)->format('%I');
        $difference['s'] = $now->diff($start_at)->format('%S');
        return $difference;
    }

    public function scopeActiveCountDowns(Builder $query)
    {
        return $query->started()->notExpired();
    }

    public static function hasActiveCountDown()
    {
        return (CountDown::query()->ActiveCountDowns()->count() > 0);
    }
}
