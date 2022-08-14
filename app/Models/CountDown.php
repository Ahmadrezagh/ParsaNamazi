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
        return $query
            ->whereDate('expire_at','>=',Carbon::now())
            ->whereTime('expire_at','>=',Carbon::now());
    }

    public function scopeStarted(Builder $query)
    {
        return $query
            ->whereDate('start_at','<=',Carbon::now())
            ->whereTime('start_at','<=',Carbon::now());
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

    public function getDifferenceTimeAttribute()
    {
        $now = Carbon::now();
        $start_at = new Carbon($this->start_at);

        $now->diff($start_at)->format('%H:%I:%S');

    }
}
