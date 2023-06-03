<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function store($channelId,Thread $thread,Request $request){
        // dd($request->body);
        $thread->addReply([
            'body'=>request('body'),
            'user_id'=>auth()->id()
        ]);


        return back();

   }
}