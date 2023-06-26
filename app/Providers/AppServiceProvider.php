<?php

namespace App\Providers;


use View;
use App\Models\Channel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        if($this->app->isLocal()){
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {

        $channels = Cache::rememberForever('channels',function(){
            return Channel::all();

        });
        view::share('channels',$channels);


    }
}