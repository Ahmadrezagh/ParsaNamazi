<?php

namespace App\Http\Controllers;

use App\Models\LoginByTelegramRequest;
use App\Models\TelegramUser;
use App\Models\Test;
use App\Models\User;
use App\Traits\MakeComponents;
use App\Traits\RequestTrait;
use App\Traits\Telegram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\URL;

class TelegramController extends Controller
{
    use Telegram;

    public function __construct()
    {
        URL::forceScheme('https');
        URL::forceRootUrl(\config('app.url'));
    }

    public function webhook()
    {
        URL::forceScheme('https');
        URL::forceRootUrl(\config('app.url'));
//        return url(route('webhook'));
        return $this->apiRequest('setWebhook',[
            'url' => url(route('webhook'))
        ]) ? ['success'] : ['something went wrong'];
    }

    public function index(Request $request)
    {
//        $result = json_decode(file_get_contents('php://input'));
        $result = $request;
        try {
            $action = $request->message['text'];
            $userId = $request->message['from']['id'];
            $user = User::findByTelegramId($userId);
            TelegramUser::checkAndAddUser($userId);
            switch ($action)
            {
                case "/start":
                    $this->sendMessage($userId,'Welcome to '.setting('name').' telegram bot!');
                    break;
                case "/down":
                    if($user && $user->isSuperAdmin)
                    {
                        Artisan::call('down');
                        $this->sendMessage($userId,'Website completely down');
                        break;
                    }
                    break;
                case "/up":
                    if($user && $user->isSuperAdmin)
                    {
                        Artisan::call('up');
                        $this->sendMessage($userId,'Website completely up');
                        break;
                    }
                    break;
                case "/login":
                    if($user)
                    {
                        $this->sendMessage($userId,"Dear ".$user->name."\nYour account already connected!");
                    }else{
                        $req = LoginByTelegramRequest::generateToken($userId);
                        $url = route('telegram.login',$req->token);
                        $this->sendMessage($userId,$url);
                    }
                    break;
                case "/me":
                    if($user)
                    {
                        $this->sendMessage($userId,"Dear ".$user->name."\nYour account information:\nCash: $".$user->cash."\nCredit: ".$user->credit."\nReferral link: \n".$user->Referral_url);
                    }else{
                        $req = LoginByTelegramRequest::generateToken($userId);
                        $url = route('telegram.login',$req->token);
                        $this->sendMessage($userId,$url);
                    }
                    break;
                case "/logout":
                    if($user)
                    {
                        $user->update([
                            'telegram_user_id' => null
                        ]);
                        $this->sendMessage($userId,"Dear ".$user->name."\nYour account disconnected!");
                    }else{
                        $this->sendMessage($userId,"Your account is not connected!");
                    }
                    break;
                default:
                    $this->sendMessage($userId,'Undefined message!!!');
                    break;
            }
        }catch (\Exception $exception)
        {
            Test::create([
                'data' => json_encode($exception),
                'type' => 'exception'
            ]);
        }
    }


    public function login($token)
    {
        $user = auth()->user();
        $loginRequest = LoginByTelegramRequest::findByToken($token);
        if($loginRequest)
        {
            if(strtotime($loginRequest->expire_at) >= time())
            {
                if($loginRequest->used == 0)
                {
                    $user->update([
                        'telegram_user_id' => $loginRequest->user_id
                    ]);
                    $loginRequest->update([
                        'used' => 1
                    ]);
                    $user->sendTelegramMessage("Dear ".$user->name."\nYou logged in successfully!!!");
                    toastr()->success('You are logged in successfully');
                    return redirect(route('home'));
                }
                toastr()->warning('Request used before');
                return redirect(route('home'));
            }
            toastr()->warning('Request expired');
            return redirect(route('home'));
        }
        toastr()->warning('Invalid request');
        return redirect(route('home'));
    }
}
