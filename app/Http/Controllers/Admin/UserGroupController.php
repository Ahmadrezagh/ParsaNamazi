<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserGroup\StoreUserGroupRequest;
use App\Http\Requests\Admin\UserGroup\UpdateUserGroupRequest;
use App\Models\UserGroup;
use Illuminate\Http\Request;

class UserGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_groups = UserGroup::query()->latest()->get();
        return view('admin.user_groups.index',compact('user_groups'));
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
    public function store(StoreUserGroupRequest $request)
    {
        UserGroup::create($request->validated());
        toastr()->success('User group created successfully');
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
    public function update(UpdateUserGroupRequest $request, UserGroup $user_group)
    {
        $user_group->update($request->validated());
        toastr()->success('User group created successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserGroup $user_group)
    {
        $user_group->delete();
        toastr()->success('User group deleted successfully');
        return back();
    }
}
