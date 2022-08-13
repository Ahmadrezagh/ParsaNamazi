<?php


namespace App\Traits;


trait Telegram
{
    use MakeComponents;
    use RequestTrait;

    private function sendMessage($user_id,$text)
    {
        $this->apiRequest('sendMessage',[
            'chat_id' => $user_id,
            'text' => $text
        ]);
    }
}