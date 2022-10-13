<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserChestGift extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'chest_id',
        'gift_id',
        'expire_at',
        'seen',
    ];

    protected $with = ['gift'];

    public function getPercentageOnAttribute()
    {
        return $this->gift->percentage_on;
    }
    public function getPercentageAttribute()
    {
        return $this->gift->percentage;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gift()
    {
        return $this->belongsTo(ChestGift::class,'gift_id');
    }

    public function chest()
    {
        return $this->belongsTo(Chest::class,'chest_id');
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

    public function scopeNotSeen(Builder $query)
    {
        return $query
            ->where('seen','=',0);
    }

    public function seen()
    {
        $this->update([
            'seen' => 1
        ]);
    }

}
