<?php

namespace App\Filters;

use App\Models\User;

use App\Filters\Filters;
use Illuminate\Support\Facades\Request;

class ThreadFilter extends Filters{


    protected $filters = ['by'];



    protected function by($username){

        $user = User::where('name',$username)->firstOrFail();
        return $this->builder->where('user_id',$user->id);

    }


}


?>