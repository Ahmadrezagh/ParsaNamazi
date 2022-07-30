<?php

namespace App\Models;

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
}
