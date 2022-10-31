<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\CountDown;
use App\Notifications\WelcomeEmailNotification;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            'referral_code' => ['nullable'],
            'agreement' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $data['referral_code'] = User::findByReferralCode($data['referral_code']) ? $data['referral_code'] : null;
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'referral_to' => $data['referral_code'],
            'ip'=> request()->getClientIp()
        ]);

        $loopUser = $user;
        while (!is_null($loopUser->referral_to))
            {
                $gift_credit = setting('gift_referral_register_credit') ?? 0;
                $gift_cash = setting('gift_referral_register_cash') ?? 0;
                $targetUser = $loopUser->referTo;
                if(count($targetUser->chestGift()->get()))
                {
                    foreach ($targetUser->chestGift()->get() as $item)
                    {
                        if($item->percentage_on && $item->percentage_on == 'REFERRALS')
                        {
                            $gift_credit = $gift_credit + ($gift_credit * ($item->percentage/100));
                        }
                    }
                }
                $targetUser->addCash($gift_cash);
                $targetUser->addCredit($gift_credit);

                $description = generateCashAndCreditNotificationDescription($gift_credit,$gift_cash);
                if($gift_credit > 0 || $gift_cash > 0){
                    $user->notifiable()->create([
                        'user_id' => $targetUser->id,
                        'description' => $description.' from inviting '.$user->name,
                        'type' => 'web'
                    ]);
                }
                $targetUser->myRefers()->attach($user->id);
                $loopUser = $targetUser;
                if(is_null($loopUser->referral_to))
                    break;
            }


        $user->notify(new WelcomeEmailNotification());
        return $user;
    }

    public function showRegistrationForm()
    {
        return redirect(url('/'));
    }
}
