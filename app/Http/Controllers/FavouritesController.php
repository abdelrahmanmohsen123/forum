<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavouritesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function store(Reply $reply){

         $reply->favorite();
         return back();
        // $reply->favorites()->create([
        //     'user_id'=> auth()->id(),
        // ])
    //    Favourite::create('favourites')->insert([

    //         'favorited_id'=>$reply->id,
    //         'favorited_type'=>get_class($reply)
    //     ]);
    }
}