<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flag extends Model
{
    use HasFactory;
    protected $fillable = [
        'title'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class,'flag_users','flag_id','user_id');
    }
}
