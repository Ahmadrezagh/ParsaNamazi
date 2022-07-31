<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'from',
        'to'
    ];

    public function countDownGroups()
    {
        return $this->hasMany(CountDownGroups::class);
    }
}
