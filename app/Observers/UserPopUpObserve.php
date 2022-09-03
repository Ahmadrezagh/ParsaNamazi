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
        $user->addCash($popUp->cash);
        $user->addCredit($popUp->credit);

        $description = generateCashAndCreditNotificationDescription($popUp->credit,$popUp->cash);
        $user->notifiable()->create([
            'user_id' => $user->id,
            'description' => $description.' from pop up',
            'type' => 'web'
        ]);

        $parentalReferrals = $user->listOfAllParentReferrals();
        if(count($parentalReferrals) > 0)
        {
            $users = User::query()->whereIn('id',$parentalReferrals)->get();
            foreach ($users as $_user)
            {
                $_user->addCash($popUp->referral_cash);
                $_user->addCredit($popUp->referral_credit);

                $user->notifiable()->create([
                    'user_id' => $_user->id,
                    'description' => $user->name.' clicked on pop up!!!',
                    'type' => 'web'
                ]);

                $description = generateCashAndCreditNotificationDescription($popUp->referral_credit,$popUp->referral_cash);
                $user->notifiable()->create([
                    'user_id' => $_user->id,
                    'description' => $description,
                    'type' => 'web'
                ]);
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
