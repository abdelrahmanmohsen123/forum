<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    //

    public function show(User $user){
        $activities = $user->activity()->take(50)->latest()->with('subject')->get()->groupBy(function($activity){
            return $activity->created_at->format('Y-m-d');
        });
        // return $activities;
        return view('profiles.show',[
            'profileUser'=>$user,
            'activities'=>\App\Models\Activity::feed($user)
        ]);

    }

    public function getActivity(User $user){
        return $activities = $user->activity()->take(50)->latest()->with('subject')->get()->groupBy(function($activity){
            return $activity->created_at->format('Y-m-d');
        });
    }
}