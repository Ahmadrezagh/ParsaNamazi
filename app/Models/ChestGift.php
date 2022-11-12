<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChestGift extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'years',
        'months',
        'days',
        'percentage',
        'percentage_on',
        'user_group_id',
        'promote_credits_time',
        'active',
    ];

    public static array $Types = [
      [
          'id' => 1,
          'title' => 'Percentage'
      ],
      [
          'id' => 2,
          'title' => 'User Group'
      ],
      [
          'id' => 3,
          'title' => 'Promote current credit x times'
      ],
    ];

    public static array $PercentageOn = [
      'REFERRALS', 'POPUPS'
    ];

    public function chests()
    {
        return $this->belongsToMany(Chest::class,'chest_gift')->withPivot('percentage');
    }

}
