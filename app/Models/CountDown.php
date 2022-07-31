<?php

namespace App\Models;

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
}
