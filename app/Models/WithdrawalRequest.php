<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawalRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'withdrawal_status_id',
        'amount',
        'wallet_address',
        'fail_reason'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
