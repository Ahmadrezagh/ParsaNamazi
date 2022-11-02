<?php

namespace App\Observers;

use App\Models\User;
use App\Models\UserPopUp;

class UserPopUpObserve
{
    /**
     * Handle the UserPopUp "created" event.
     *
     * @param  \App\Models\UserPopUp  $userPopUp
     * @return void
     */
    public function created(UserPopUp $userPopUp)
    {
        $user = $userPopUp->user;
        $popUp = $userPopUp->popUp;
        $gift_credit = $popUp->credit;
        if(count($user->chestGift()->get()))
        {
            foreach ($user->chestGift()->get() as $item)
            {
                if($item->percentage_on && $item->percentage_on == 'POPUPS')
                {
                    $gift_credit = $gift_credit  + ($gift_credit * ($item->percentage/100));
                }
            }
        }
        $user->addCash($popUp->cash);
        $user->addCredit($gift_credit);
        $description = generateCashAndCreditNotificationDescription($gift_credit,$popUp->cash);
        if($gift_credit > 0 || $popUp->cash > 0) {
            $user->notifiable()->create([
                'user_id' => $user->id,
                'description' => $description . ' from pop up',
                'type' => 'web'
            ]);
        }
        $parentalReferrals = $user->listOfAllParentReferrals()->pluck('user_id')->toArray();
        if(count($parentalReferrals) > 0)
        {
            $users = User::query()->whereIn('id',$parentalReferrals)->get();
            foreach ($users as $_user)
            {
                $_user->addCash($popUp->referral_cash);
                $_user->addCredit($popUp->referral_credit);
                $description = generateCashAndCreditNotificationDescription($popUp->referral_credit,$popUp->referral_cash);
                if($popUp->referral_credit > 0 || $popUp->referral_cash > 0){
                    $user->notifiable()->create([
                        'user_id' => $_user->id,
                        'description' => $description.' from '.$user->name,
                        'type' => 'web'
                    ]);
                }

            }
        }
    }

    /**
     * Handle the UserPopUp "updated" event.
     *
     * @param  \App\Models\UserPopUp  $userPopUp
     * @return void
     */
    public function updated(UserPopUp $userPopUp)
    {
        //
    }

    /**
     * Handle the UserPopUp "deleted" event.
     *
     * @param  \App\Models\UserPopUp  $userPopUp
     * @return void
     */
    public function deleted(UserPopUp $userPopUp)
    {
        //
    }

    /**
     * Handle the UserPopUp "restored" event.
     *
     * @param  \App\Models\UserPopUp  $userPopUp
     * @return void
     */
    public function restored(UserPopUp $userPopUp)
    {
        //
    }

    /**
     * Handle the UserPopUp "force deleted" event.
     *
     * @param  \App\Models\UserPopUp  $userPopUp
     * @return void
     */
    public function forceDeleted(UserPopUp $userPopUp)
    {
        //
    }
}
