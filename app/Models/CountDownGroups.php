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

}
