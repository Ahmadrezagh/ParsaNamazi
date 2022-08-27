<?php


namespace App\Traits;


use App\Models\Test;
use Illuminate\Support\Facades\Http;

trait RequestTrait
{
    private function apiRequest($method, $parameters = [])
    {
        $url = "https://api.telegram.org/bot".env('TELEGRAM_TOKEN').'/'.$method;
        $response = Http::post($url,$parameters);
        Test::create([
            'data' => json_encode([
                'url' => $url,
                'params' => $parameters
            ]),
            'type' => 'result'
        ]);
        if($response == false)
        {
            return $response;
        }
        $response = json_decode($response,true);
        if($response['ok'] == false)
        {
            return $response;
        }
        $response = $response['result'];
        return $response;
    }
}