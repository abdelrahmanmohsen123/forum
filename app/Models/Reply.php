<?php

namespace App\Models;

use App\Traits\RecordActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory,RecordActivity;

    protected $guarded = [];

    public function owner(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function favorites(){
        return $this->morphMany(Favourite::class,'favorited');
    }

    public function favorite(){

        $attributes =  ['user_id'=> auth()->id()];
        if(!$this->favorites()->where($attributes )->exists()){
            return $this->favorites()->create($attributes);
        }

    }

    public  function isFavourited(){
        return $this->favorites()->where('user_id',auth()->id())->exists();
    }

    public function thread(){
        return $this->belongsTo(Thread::class);
    }




}