<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopUp extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'count_limit',
        'cash',
        'credit',
        'referral_cash',
        'referral_credit',
        'expire_at'
    ];

    public function getExpiredAttribute()
    {
        return (strtotime($this->expire_at) < time());
    }
    public function getNotExpiredAttribute()
    {
        return !($this->expired);
    }

    public function scopeNotExpired(Builder $query)
    {
        return $query
            ->whereDate('expire_at','=',Carbon::now())
            ->whereTime('expire_at','>=',Carbon::now())
            ->orWhereDate('expire_at','>=',Carbon::now());
    }

    public function clickedByUsers()
    {
        return $this->belongsToMany(User::class,'user_pop_ups','pop_up_id','user_id');
    }

    public function getAlreadyClickedAttribute()
    {
        $user = auth()->user();
        return UserPopUp::query()->where('user_id','=',$user->id)->where('pop_up_id','=',$this->id)->first();
    }

    public function getTotalClicksAttribute()
    {
        return UserPopUp::query()->where('pop_up_id','=',$this->id)->count();
    }


}
