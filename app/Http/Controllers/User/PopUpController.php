<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PopUp;
use App\Models\UserPopUp;
use Illuminate\Http\Request;

class PopUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();
        $pop_up = PopUp::find($id);
        if($pop_up)
        {
            if($pop_up->not_expired)
            {
                if($pop_up->count_limit > $pop_up->total_clicks)
                {
                    if(!$pop_up->already_clicked)
                    {
                        UserPopUp::create([
                            'user_id' => $user->id,
                            'pop_up_id' => $pop_up->id
                        ]);
                        alert()->success('You successfully clicked on pop up and got cash and credit');
                        return back();
                    }
                    alert()->warning('You already clicked on this pop up');
                    return back();
                }
                alert()->warning('Pop up request is over the limit');
                return back();
            }
            alert()->warning('Pop up has expired');
            return back();
        }
        alert()->warning('Pop up not found');
        return back();
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
