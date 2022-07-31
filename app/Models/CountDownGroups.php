<?php

namespace App\Models;

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
}
