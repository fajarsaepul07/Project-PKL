<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
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
    


public function boot(): void
{
    View::composer('*', function ($view) {
        $cartItems = collect(); 

        if (Auth::check()) {
            $cartItems = Cart::with('product')
                ->where('user_id', Auth::id())
                ->get();
        }

        $view->with('cartItems', collect($cartItems));
    });
}

}
