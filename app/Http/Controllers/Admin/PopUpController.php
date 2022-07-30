<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PopUp\StorePopUpRequest;
use App\Http\Requests\Admin\PopUp\UpdatePopUpRequest;
use App\Models\PopUp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PopUpController extends Controller
{
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
        toastr()->success('PopUp created successfully');
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
        toastr()->success('PopUp updated successfully');
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
        toastr()->success('PopUp deleted successfully');
        return back();
    }
}
