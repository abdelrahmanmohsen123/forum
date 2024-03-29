<?php

namespace App\Models;

use App\Traits\RecordActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;
    use RecordActivity;
    protected $guarded =[];
    public function favorited(){
        return $this->morphTo();
    }
}
