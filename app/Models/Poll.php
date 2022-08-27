<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'active'
    ];

    protected $with = [
        'users'
    ];

    public function options()
    {
        return $this->hasMany(PollOption::class,'poll_id','id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'poll_users','poll_id','user_id');
    }

    public function scopeActive($query)
    {
        return $query->where('active','=',1);
    }


}
