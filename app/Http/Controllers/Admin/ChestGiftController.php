<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChestGifts\StoreChestGiftRequest;
use App\Http\Requests\Admin\ChestGifts\UpdateChestGiftRequest;
use App\Models\ChestGift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChestGiftController extends Controller
{
    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            if ((Auth::user()->isAdmin() && Auth::user()->can('Chest')) || Auth::user()->isSuperAdmin())
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
        $chest_gifts = ChestGift::query()->latest()->get();
        return view('admin.chest_gifts.index',compact('chest_gifts'));
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
    public function store(StoreChestGiftRequest $request)
    {
        ChestGift::create($request->validated());
        alert()->success('Gift created successfully');
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
    public function update(UpdateChestGiftRequest $request, ChestGift $chest_gift)
    {
        $chest_gift->update($request->validated());
        alert()->success('Gift updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChestGift $chest_gift)
    {
        $chest_gift->delete();
        alert()->success('Gift deleted successfully');
        return back();
    }
}
