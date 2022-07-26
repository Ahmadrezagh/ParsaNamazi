<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PopUp\StorePopUpRequest;
use App\Http\Requests\Admin\PopUp\UpdatePopUpRequest;
use App\Models\CountDown;
use App\Models\PopUp;
use App\Models\TelegramUser;
use App\Traits\Telegram;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PopUpController extends Controller
{
    use Telegram;
    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            if ((Auth::user()->isAdmin() && Auth::user()->can('PopUp')) || Auth::user()->isSuperAdmin())
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
        $popups = PopUp::query()->latest()->get();
        return view('admin.popups.index',compact('popups'));
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
    public function store(StorePopUpRequest $request)
    {
        $validated = $request->validated();
        $validated['expire_at'] = Carbon::now()->addMinutes($validated['expire_after']);
        PopUp::create($validated);
        alert()->success('PopUp created successfully');

        $telegram_users = TelegramUser::all();

        foreach ($telegram_users as $telegram_user)
        {
            $this->sendMessage($telegram_user->user_id,'Pop up just got generated, don’t miss the prize');
        }

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
    public function update(UpdatePopUpRequest $request, PopUp $popup)
    {
        $popup->update($request->validated());
        alert()->success('PopUp updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PopUp $popup)
    {
        $popup->delete();
        alert()->success('PopUp deleted successfully');
        return back();
    }
}
