<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PollOption;
use App\Models\PollUser;
use Illuminate\Http\Request;

class PollController extends Controller
{
    public function pollRequest($id)
    {
        $user = auth()->user();
        $pollOption = PollOption::findOrFail($id);
        $poll = $pollOption->poll;
        if($poll->users()->where('user_id','=',$user->id)->exists()){
            alert()->warning('You have already participated in this survey');
            return back();
        }
        PollUser::create([
            'user_id' => $user->id,
            'poll_id' => $poll->id,
            'poll_option_id' => $pollOption->id
        ]);
        alert()->success('Your vote has been successfully registered');
        return back();
    }
}
