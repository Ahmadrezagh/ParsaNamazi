<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CountDown\StoreCountDownRequest;
use App\Http\Requests\Admin\CountDown\UpdateCountDownRequest;
use App\Models\CountDown;
use App\Models\CountDownGroups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CountDownController extends Controller
{
    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            if ((Auth::user()->isAdmin() && Auth::user()->can('CountDown')) || Auth::user()->isSuperAdmin())
            {
                return $next($request);
            }else{
                abort(404);
            }
        });

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count_downs = CountDown::query()->latest()->get();
        return view('admin.count_downs.index',compact('count_downs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCountDownRequest $request)
    {
        $count_down = CountDown::create($request->validated());
        foreach ($request->user_groups as $user_group)
        {
            if(isset($user_group['user_group_id']) && isset($user_group['show_at']))
            {
                $user_group_object = $user_group;
                $user_group_object['count_down_id'] = $count_down->id;
                CountDownGroups::create($user_group_object);
            }
        }
        alert()->success('Count down created successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCountDownRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountDown $count_down)
    {
        $count_down->delete();
        alert()->success('Count down deleted successfully');
        return back();
    }
}
