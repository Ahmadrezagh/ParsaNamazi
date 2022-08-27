<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelegramUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id'
    ];

    public static function checkAndAddUser($user_id)
    {
        TelegramUser::query()->where('user_id','=',$user_id)->firstOrCreate([
            'user_id' => $user_id
        ]);
    }

}
