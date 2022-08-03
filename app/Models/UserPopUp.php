<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPopUp extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'pop_up_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function popUp()
    {
        return $this->belongsTo(PopUp::class);
    }

}
