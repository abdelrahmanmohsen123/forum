<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function subject(){
        return $this->morphTo();
    }

    public static function feed($user,$take=50){

        return $activities = $user->activity()->take($take)->latest()->with('subject')->get()->groupBy(function($activity){
            return $activity->created_at->format('Y-m-d');
        });

    }
}