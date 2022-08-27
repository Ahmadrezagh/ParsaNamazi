<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LoginByTelegramRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'token',
        'expire_at',
        'used'
    ];

    public static function generateToken($user_id,$expire_time_in_minute = 5)
    {
       return LoginByTelegramRequest::create([
            'user_id' => $user_id,
            'token' => Str::uuid(),
            'expire_at' => Carbon::now()->addMinutes($expire_time_in_minute)
        ]);
    }

    public static function findByToken($token)
    {
        return LoginByTelegramRequest::query()->where('token','=',$token)->first();
    }

}
