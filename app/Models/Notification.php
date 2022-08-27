<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'description',
        'notifiable_id',
        'notifiable_type',
        'type',
        'seen'
    ];

    public function notifiable():MorphTo
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeNotSeen(Builder $query)
    {
        return $query->where('seen','=',0);
    }

    public static function NewNotifications()
    {
        return auth()->user()->notifications()->latest()->notSeen();
    }

    public static function AllNotifications()
    {
        return auth()->user()->notifications()->latest();
    }

}
