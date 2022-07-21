<?php

namespace App\Providers;

use App\Slug\Slug;
use Illuminate\Support\ServiceProvider;

class SlugServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
       $this->app->singleton("slug", function(){
           return new Slug();
       });  
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
