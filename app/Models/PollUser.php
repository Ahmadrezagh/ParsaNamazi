<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'poll_id',
        'poll_option_id'
    ];
}
