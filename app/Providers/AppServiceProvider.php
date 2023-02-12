<?php

namespace App\Providers;

// use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        //view()->composer('layouts.app', function($view) {
            //
            // $categories = \App\Category::where('id', 0)->with('subcategories')->get();
            //$view->with(compact('categories'));
        //});


    }


}
