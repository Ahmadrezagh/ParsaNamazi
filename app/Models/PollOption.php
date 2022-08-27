<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollOption extends Model
{
    use HasFactory;
    protected $fillable = [
        'poll_id',
        'title'
    ];

    public function poll()
    {
        return $this->belongsTo(Poll::class,'poll_id','id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'poll_users','poll_option_id','user_id');
    }

    public function getPercentageAttribute()
    {
        $percentage = 0;
        if($this->poll->users()->count() > 0 && $this->users()->count() > 0)
        {
            $percentage = ($this->users()->count()  / $this->poll->users->count()) * 100;
        }
        return $percentage;
    }
}
