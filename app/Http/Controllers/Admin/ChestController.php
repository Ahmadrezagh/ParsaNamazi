<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Chests\StoreChestRequest;
use App\Http\Requests\Admin\Chests\UpdateChestRequest;
use App\Models\Chest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChestController extends Controller
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
        $chests = Chest::query()->latest()->get();
        return view('admin.chests.index',compact('chests'));
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
    public function store(StoreChestRequest $request)
    {
        $chest = Chest::create($request->validated());
        $gifts = $request->gifts;
        foreach ($gifts as $gift)
        {
            $gift['chest_id'] = $chest->id;
        }
        $chest->gifts()->sync($gifts);
        alert()->success('Chest created successfully');
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
    public function update(UpdateChestRequest $request, Chest $chest)
    {
        $chest->update($request->validated());
        $gifts = $request->gifts;
        foreach ($gifts as $gift)
        {
            $gift['chest_id'] = $chest->id;
        }
        $chest->gifts()->sync($gifts);
        alert()->success('Chest created successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chest $chest)
    {
        $chest->delete();
        alert()->success('Chest deleted successfully');
        return back();
    }

    public function testChest($id)
    {
        $chest = Chest::find($id);
        $gift = $chest->selectRandomGift();
        alert()->success('You win chest: '.$gift->title);
        return back();
    }
}
