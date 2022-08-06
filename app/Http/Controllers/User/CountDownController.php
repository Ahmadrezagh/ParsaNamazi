<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CountDown\ShowCountDownTextRequest;
use App\Models\CountDown;
use Illuminate\Http\Request;

class CountDownController extends Controller
{
    public function showText(ShowCountDownTextRequest $request)
    {
        $id = $request->count_down_id;
        $countDown = CountDown::findOrFail($id);
        if($countDown->show_for_user && (strtotime($countDown->show_for_user->show_at) <= time()) )
        {
            return $countDown;
        }
        return abort(403);
    }
}
