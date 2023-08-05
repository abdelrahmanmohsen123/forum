<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Thread;
use App\Models\Channel;
use Illuminate\Http\Request;
use App\Filters\ThreadFilter;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function __construct()
    {
        $this->middleware('auth')->only('store','create');

    }
    public function index(Channel $channel,ThreadFilter $filters)
    {



        $threads = $this->getThreads($channel,$filters);
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
       return redirect($thread->path())->with('success','Thread created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($channelId,Thread $thread)
    {
        //

        return view('threads.show',[
        'channelId'=>$channelId,
        'thread'=>$thread,
        'replies'=>$thread->replies()->paginate(1)
        ]);
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
        $this->authorize('update',$thread);
        // if($thread->user_id != auth()->id()){
        //     abort(403,'you dont have permission to do this');
        // }
        $thread->delete();
        return redirect()->route('threads.index');
    }

    public function getThreads($channel,$filters){
        $threads = Thread::latest()->filter($filters);
        if($channel->exists){
            $threads->where('channel_id',$channel->id);
            //dd($threads);
        }
        $threads = $threads->get();
        return $threads;
    }

}