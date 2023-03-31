<?php

namespace App\Providers;
use Session;

use App\View\Composers\ProfileComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;

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
                'navcategories' => Category::with('subcategories')->get(),
                'cartCount' => Cart::where('user_id', Auth::id())->count(),
                'cartItems' => Cart::all(),
                'products' => Product::all(),
                'auth_check' => Auth::check() && Cart::where('user_id', Auth::id()),
                // 'cartItem' => Cart::where('user_id', Auth::id())->get();
                'checkifloggedin' => Auth::check(),
              ]);
        });

    }
}
