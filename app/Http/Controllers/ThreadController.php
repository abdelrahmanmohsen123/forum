<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function __construct()
    {
        $this->middleware('auth')->only('store','create');

    }
    public function index(Channel $channel)
    {
        //
        if($channel->exists){
            $threads = $channel->threads()->latest();
            //dd($threads);
        }else{
            $threads = Thread::latest();
        }

        if($username = request('by')){
            $user = User::where('name',$username)->firstOrFail();
            $threads->where('user_id',$user->id);
        }
        $threads = $threads->get();

       // dd($threads->toArray());
        return view('threads.index',compact('threads'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // dd('hi');
        return view('threads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'title'=>'required',
            'body' => 'required',
            'channel_id'=>'required|exists:channels,id'
        ]);


       $thread =  Thread::create([
            'user_id'=>auth()->id(),
            'channel_id'=>request('channel_id'),

            'title'=>request('title'),
            'body'=>request('body'),

       ]);
       return redirect($thread->path());
    }

    /**
     * Display the specified resource.
     */
    public function show($channelId,Thread $thread)
    {
        //

        return view('threads.show',compact('thread','channelId'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Thread $thread)
    {
        //
    }
}