<?php


namespace App\Traits;

use App\Models\Activity;
use Illuminate\Notifications\Action;

trait RecordActivity{

    public static function bootRecordActivity(){
        static::created(function($thread){
            $thread->recordActivities('created');
        });

    }


    protected function recordActivities($event){
        $this->activity()->create([
            'user_id'=>auth()->id(),
            'type'=>$this->getActivityType($event),
        ]);
        // Activity::create([

        //     'subject_id'=>$this->id,
        //     'subject_type'=>get_class($this),
        // ]);

    }

    public function getActivityType($event){
        $type = strtolower((new \ReflectionClass($this))->getShortName());
       return $event .'_'. $type;
    }

    public function activity(){

        {
            return $this->morphMany(Activity::class, 'subject');
        }
    }




}



?>