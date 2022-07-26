<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

function setting($name)
{
    return \App\Models\Setting::getValue($name);
}

function upload_file($file,$file_path = null,$name = null ): string
{
    $path = '/uploads'.$file_path;
    // User image name is = user's phone.img
    if($name)
    {
        $file_name = $name.".".$file->getClientOriginalExtension();
    }else
    {
        $file_name = $file->getClientOriginalName();
    }
    // Upload Image
    $file->move(public_path($path), $file_name);
    // Generate image path
    return strval($path."/".$file_name);
}
function upload_files($files = null , $file_path = null , $random_name = false )
{
    if($files != null )
    {
        $file_paths = [];
        foreach ($files as $file)
        {
            $path = upload_file($file,$file_path,$random_name ? Str::random(8) : null);
            array_push($file_paths,$path);
        }
        return $file_paths;
    }
}

if (!function_exists('try_catch_null')) {
    function try_catch_null($closure)
    {
        try {
            return $closure();
        } catch (Exception $ex) {
            return null;
        }
    }
}

function generateCashAndCreditNotificationDescription($credit,$cash)
{
    $description = 'You get ';
    if($credit > 0)
    {
        $description = $description.$credit.' credit';
    }
    if($cash > 0)
    {
        if($credit > 0)
        {
            $description = $description.' and '.$cash.' cash';
        }else{
            $description = $description.$cash.' cash';
        }
    }
    return $description;
}

function findRefers($users)
{
    foreach ($users as $user)
    {
        echo view('sections.user_referral_item',compact('user'));
        if($user->myRefers && count($user->myRefers))
        {
            findRefers($user->myRefers);
        }
    }
}

function RefersCount($users)
{
    foreach ($users as $user)
    {
        if($user->myRefers && count($user->myRefers))
        {
            RefersCount($user->myRefers);
        }
    }
}

