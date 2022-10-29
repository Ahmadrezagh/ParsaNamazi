<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            if ((Auth::user()->isAdmin() && Auth::user()->can('User')) || Auth::user()->isSuperAdmin())
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
    public function index(Request $request)
    {
        $users = User::withTrashed()
            ->Users()
            ->fromCredit($request->from_credit)
            ->toCredit($request->to_credit)
            ->withFlag($request->flag_id)
            ->latest()
            ->get();
        if($request->group && $request->group != -1)
        {
            $users = $users->where('user_group_idd','=',$request->group);
        }
        return view('admin.users.index',compact('users'));
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
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = 3;
        $user = User::create($validated);
        $user->flags()->sync($request->flags);
        alert()->success('User created successfully');
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
    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();
        if($request->user_group_id == 0)
        {
            $validated['user_group_id'] = null;
        }
        $user->update($validated);
        if ($request->hasFile('image'))
        {
            $image = $user->image;
            $image = upload_file($request->file('image'),'/profiles',$user->id);
            $user->update([
                'profile' => $image
            ]);
        }
        $user->flags()->sync($request->flags);
        alert()->success('User updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->forceDelete();
        alert()->success('User deleted successfully');
        return back();
    }

    public function resetCredits()
    {
        $users = User::query()->get();
        foreach ($users as $user)
        {
            $user_store_credit = $user->store_credit;
            $user->update([
                'credit' => $user_store_credit,
                'store_credit' => 0
            ]);
        }
        alert()->success('Credit reset successfully done!!');
        return back();
    }

    public function resetCashes()
    {
        $users = User::query()->get();
        foreach ($users as $user)
        {
            $user->update([
                'cash' => 0
            ]);
        }
        alert()->success('Cash reset successfully done!!');
        return back();
    }

    public function block($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        alert()->success('User blocked successfully');
        return back();
    }
    public function unBlock($id)
    {
        $user = User::withTrashed()->find($id);
        $user->update([
            'deleted_at' => null
        ]);
        alert()->success('User unblocked successfully');
        return back();
    }
}
