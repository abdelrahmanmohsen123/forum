<?php

namespace App\Models;

use App\Models\Reply;
use App\Traits\RecordActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Reflection;
use ReflectionClass;

class Thread extends Model
{
    use RecordActivity;
    protected $guarded = [];
    use HasFactory;
    public function path(){
        return "/threads/{$this->channel->slug}/{$this->id}";

        return 'threads/' . $this->channel->slug .'/'. $this->id;
    }

    public function replies(){
        return $this->hasMany(Reply::class)->withCount('favorites')->with('owner');
    }

    public function creator()
    {
        return $this->belongsTo(User::class,'user_id');
        # code...
    }

    public function addReply($reply){
        return $this->replies()->create($reply);

    }

    public function Channel(){
        return $this->belongsTo(Channel::class);
    }

    public function scopeFilter($query,$filters){
        return $filters->apply($query);

    }

    public static function boot(){
        parent::boot();
        static::addGlobalScope('replyCount',function($builder){
            $builder->withCount('replies');
        });

        static::deleting(function($thread){
            $thread->replies->each->delete();
        });




    }




}