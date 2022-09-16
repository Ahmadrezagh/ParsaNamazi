<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserChestActivity;
use Illuminate\Http\Request;

class ChestActivityController extends Controller
{
    public function logActivity(Request $request)
    {
        UserChestActivity::logActivity($request->timezone);
    }
}
