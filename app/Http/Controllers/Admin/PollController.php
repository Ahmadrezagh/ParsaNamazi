<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Poll\StorePollRequest;
use App\Http\Requests\Admin\Poll\UpdatePollRequest;
use App\Models\Poll;
use Illuminate\Http\Request;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polls = Poll::query()->latest()->get();
        return view('admin.polls.index',compact('polls'));
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
    public function store(StorePollRequest $request)
    {
        $poll = Poll::create([
            'title' => $request->title,
        ]);
        foreach ($request->options as $option)
        {
            $poll->options()->create([
                'title' => $option
            ]);
        }
        alert()->success('Poll created successfully');
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
    public function update(UpdatePollRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poll $poll)
    {
        $poll->options()->delete();
        $poll->delete();
        alert()->success('Poll deleted successfully');
        return back();
    }

    public function changeStatus(Poll $poll)
    {
        $newStatus = intval(!($poll->active));
        $poll->update([
            'active' => $newStatus
        ]);
        alert()->success('Poll status changed');
        return back();
    }
}
