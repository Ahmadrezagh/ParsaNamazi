<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Chest extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'required_online_days',
        'active'
    ];

    public function scopeActive($query)
    {
        return $query->where('active','=',1);
    }

    public function gifts()
    {
        return $this->belongsToMany(ChestGift::class,'chest_gift')->withPivot('percentage');
    }

    public function selectRandomGift():ChestGift
    {
        $array_of_gift_ids = [];
        $gifts = $this->gifts;
        foreach ($gifts as $gift)
        {
            for($i=1; $i<=$gift->pivot->percentage; $i++)
            {
                array_push($array_of_gift_ids,$gift->id);
            }
        }
        $shuffle_version_of_array_of_gift_ids = Arr::shuffle($array_of_gift_ids);
        $random_object_id = Arr::random($shuffle_version_of_array_of_gift_ids);
//        return $random_object_id;
        return ChestGift::find($random_object_id);
    }
}
