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
        'to',
        'percentage',
        'priority'
    ];

    public function countDownGroups()
    {
        return $this->hasMany(CountDownGroups::class);
    }

    public static function groups()
    {
       $used_users_ids = [];

       $users = User::query()->users()->where('credit','>',0)->orderBy('credit','desc');
       $user_groups = UserGroup::query()->orderBy('priority')->get();

       foreach ($user_groups as $user_group)
       {
        if ($user_group->percentage > 0)
        {
            $all_users_count = $users->count();
            $percentage = $user_group->percentage;
            $users_count = intval($all_users_count * ($percentage/100) );
            $user_group['users_count'] = $users_count;
            $user_group['users'] = $users->whereNotIn('id',$used_users_ids)->take($user_group['users_count'])->get();
            $used_users_ids = array_merge($used_users_ids,$users->whereNotIn('id',$used_users_ids)->take($user_group['users_count'])->pluck('id')->toArray());

        }
       }
       return $user_groups;
    }
}
