<?php
namespace App\Providers;

use App\Models\Cart;
use Auth;
use Illuminate\Support\ServiceProvider;
use Midtrans\Config;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        View::composer('*', function ($view) {
            $cartItems = [];

            if (Auth::check()) {
                $cartItems = Cart::with('product')
                    ->where('user_id', Auth::id())
                    ->get();
            }

            // pastikan ini adalah collection, bukan array
            $view->with('cartItems', collect($cartItems));
        });

        Config::$serverKey    = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$clientKey    = config('midtrans.clientKey');
        Config::$isSanitized  = true;
        Config::$is3ds        = true;

    }
}
