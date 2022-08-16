<?php

namespace App\Models;

use App\Services\Permission\Traits\HasPermissions;
use App\Services\Permission\Traits\HasRoles;
use App\Traits\Telegram;
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
        return UserGroup::query()->where([
            ['from','<=',$this->credit],
            ['to','>=',$this->credit]
        ])->orWhere([
            ['from','<=',$this->credit],
            ['to','=',null]
        ])->first();
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
}
