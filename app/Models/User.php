<?php

namespace App\Models;

use App\Services\Permission\Traits\HasPermissions;
use App\Services\Permission\Traits\HasRoles;
use App\Traits\Telegram;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable,HasRoles, HasPermissions;
    use SoftDeletes;
    use Telegram;
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = !is_null($value) ? bcrypt($value) : $this->password;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile',
        'type_id',
        'credit',
        'cash',
        'referral_code',
        'referral_to',
        'telegram_user_id',
        'ip',
        'user_group_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function isSuperAdmin()
    {
        return $this->type_id == 1  ? true : false;
    }
    //  Admin
    //  Get Admins
    public function scopeAdmins($query)
    {
        return $query->where('type_id', 2);
    }

    //  Check is admin
    public function isAdmin()
    {
        return $this->type_id == 2  ? true : false;
    }

    // if user is admin , show admin's role
    public function role()
    {
        return $this->belongsToMany(Role::class);
    }

    //
    //  User
    // Get All users
    public function scopeUsers($query)
    {
        return $query->where('type_id', 3);
    }

    // Check is user
    public function isUser()
    {
        return $this->type_id == 3  ? true : false;
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }

    public function profile()
    {
        return $this->profile ?? '/uploads/profiles/default/user.png';
    }

    public function getReferralUrlAttribute()
    {
        return url('/').'?key='.$this->referral_code;
    }

    public static function findByReferralCode($code)
    {
        if($code)
        {
            return User::query()->where('referral_code','=',$code)->first() ?? null;
        }
        return null;
    }

    public function referTo()
    {
        return $this->belongsTo(User::class,'referral_to','referral_code');
    }

    public function myRefers()
    {
        return $this->hasMany(User::class,'referral_to','referral_code');
    }

    public function clickedPopUps()
    {
        return $this->belongsToMany(PopUp::class,'user_pop_ups','user_id','pop_up_id');
    }

    public function notifiable():MorphOne
    {
        return $this->morphOne(Notification::class, 'notifiable');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function addCash($cash)
    {
        $newCash = $this->cash + $cash;
        $this->update([
            'cash' => $newCash
        ]);
    }

    public function addCredit($cash)
    {
        $newCredit = $this->credit + $cash;
        $this->update([
            'credit' => $newCredit
        ]);
    }

    public function listOfAllParentReferrals()
    {
        $listOfUserIds = [];
        $user = User::find($this->id);
        while($user && $user->referral_to)
        {
            $user = User::findByReferralCode($user->referral_to);
            array_push($listOfUserIds,$user->id);
        }
        return $listOfUserIds;
    }

    public function getUserGroupAttribute()
    {
        if($this->user_group_id)
        {
            return UserGroup::find($this->user_group_id);
        }
        if($this->credit > 0)
        {
            $used_users_ids = [];

//            $users = User::query()->users()->where('credit','>',0)->orderBy('credit','desc');
            $user_groups = UserGroup::query()->orderBy('priority')->get();
            $all_users_count = User::query()->users()->where('credit','>',0)->orderBy('credit','desc')->count();
            foreach ($user_groups as $user_group)
            {
                if ($user_group->percentage > 0){
                    $percentage = $user_group->percentage;
                    $users_count = intval($all_users_count * ($percentage/100) );
                    $user_group['users_count'] = $users_count;
                    $user_ids = User::query()->users()->where('credit','>',0)->orderBy('credit','desc')->whereNotIn('id',$used_users_ids)->take($users_count)->pluck('id')->toArray();
                    if(in_array($this->id,$user_ids))
                    {
                        return $user_group;
                    }
                    $used_users_ids = array_merge($used_users_ids,$user_ids);
                }
            }
        }
    }

    public function getUserGroupIddAttribute($value)
    {
        if($value)
        {
            return $value;
        }
        if($this->user_group)
        {
            return $this->user_group->id;
        }
    }

    public function getCountDownsAttribute()
    {
        $user_group = $this->user_group;
        if($user_group)
        {
            return CountDown::query()->whereHas('countDownGroups',function (Builder $query) use ($user_group) {
                return $query->where('user_group_id','=',$user_group->id);
            });
        }
    }

    public function sendTelegramMessage($message)
    {
        $this->sendMessage($this->telegram_user_id,$message);
    }

    public static function findByTelegramId($user_id)
    {
        return User::query()->where('telegram_user_id','=',$user_id)->first();
    }

    public function scopeFilterByGroup(Builder $query,$user_group_id = null)
    {
        if($user_group_id)
        {
            return $query->where('user_group','=',$user_group_id);
        }
        return $query;
    }

    public function scopeFromCredit(Builder $query,$from_credit = null)
    {
        if($from_credit && is_numeric($from_credit))
        {
            return $query->where('credit','>=',$from_credit);
        }
        return $query;
    }
    public function scopeToCredit(Builder $query,$to_credit = null)
    {
        if($to_credit && is_numeric($to_credit))
        {
            return $query->where('credit','<=',$to_credit);
        }
        return $query;
    }

    public function polls()
    {
        return $this->belongsToMany(Poll::class,'poll_users','user_id','poll_id');
    }

    public function selectedPollOptions()
    {
        return $this->belongsToMany(PollOption::class,'poll_users','user_id','poll_option_id');
    }

    public function flags()
    {
        return $this->belongsToMany(Flag::class,'flag_users','user_id','flag_id');
    }

    public function scopeWithFlag(Builder $query,$flag_id = null)
    {
        if($flag_id && is_numeric($flag_id) && ($flag_id > 0))
        {
            return $query->whereHas('flags',function ($q) use ($flag_id) {
                return $q->where('flag_id','=',$flag_id);
            });
        }
        return $query;
    }
    public function withdrawals()
    {
        return $this->hasMany(WithdrawalRequest::class);
    }

    public function getHasPendingWithdrawalRequestAttribute()
    {
        return (bool)($this->withdrawals()->where('withdrawal_status_id','=',1)->first());
    }

//    public function findRefers($users,$allRefers)
//    {
//        foreach ($users as $user)
//        {
//            array_push($allRefers,$user);
//            if($user->myRefers && count($user->myRefers))
//            {
//                $this->findRefers($user->myRefers,$allRefers);
//            }
//        }
//    }

    public function activeChest($chest_id)
    {
        $now = Carbon::now();
        return UserChestGift::query()
            ->where('user_id','=',$this->id)
            ->where('chest_id','=',$chest_id)
            ->whereDate('expire_at','=',$now)
            ->whereTime('expire_at','>',$now)
            ->orWhereDate('expire_at','>',$now)
            ->first();
    }
    public function hasActiveChest($chest_id):bool
    {
        return (bool) $this->activeChest($chest_id);
    }

    public function chestGift()
    {
        return $this->hasMany(UserChestGift::class);
    }

    public function chestActivities()
    {
        return $this->hasMany(UserChestActivity::class);
    }

    public function checkActivityAndGetGift($chest_id)
    {
        $chest = Chest::find($chest_id);
        $userChestActivitiesCount = $this->chestActivities()
            ->where('chest_id','=',$chest_id)
            ->count();
        if($chest && ($userChestActivitiesCount) == $chest->required_online_days ){
            $gift = $chest->selectRandomGift();
            $expire_at = $this->calculateExpireAt($gift->years,$gift->months,$gift->days);
            $this->registerGift($chest_id,$gift->id,$expire_at);
            $this->removePreviousLogOfChest($chest->id);
        }
    }

    public function calculateExpireAt($years,$months,$days)
    {
        return Carbon::now()->addYears($years ?? 0)->addMonths($months ?? 0)->addDays($days ?? 0);
    }

    public function registerGift($chest_id,$gift_id,$expire_at)
    {
        $gift = ChestGift::find($gift_id);
        if($gift->type == 2)
        {
            $this->update([
                'user_group_id' => $gift->user_group_id
            ]);
        }
        $this->chestGift()->create([
            'chest_id' => $chest_id,
            'gift_id' => $gift_id,
            'expire_at' => $expire_at
        ]);
    }

    public function removePreviousLogOfChest($chest_id)
    {
        $this->chestActivities()
            ->where('chest_id','=',$chest_id)
            ->delete();
    }
}
