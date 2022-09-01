<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        alert()->success('Admin created successfully');
        if(Auth::user()->isAdmin() || Auth::user()->isSuperAdmin())
        {
            return view('admin.index');
        }elseif(Auth::user()->isUser())
        {
            return view('user.index');
        }
    }
}
