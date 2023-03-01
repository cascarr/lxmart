<?php

namespace App\Providers;

use App\View\Composers\ProfileComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\Subcategory;
use Cart;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Facades\View::composer('frontend.layouts.app', function(View $view) {

            $view

              ->with([
                'navcategories' => Category::with('subcategories')->get()

              ]);
        });

    }
}
