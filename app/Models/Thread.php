<?php

namespace App\Models;

use App\Models\Reply;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Thread extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function path(){
        return "/threads/{$this->channel->slug}/{$this->id}";

        return 'threads/' . $this->channel->slug .'/'. $this->id;
    }

    public function replies(){
        return $this->hasMany(Reply::class);
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
}