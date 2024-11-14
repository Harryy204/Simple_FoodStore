<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Session;
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

        // Share cart_quantity
        // view()->share('cart_quantity', $cart_quantity);
        $mucgia = DB::table('tbl_mucgia')->get();
        $hangsp = DB::table('tbl_loaimon')->get();
        Paginator::useBootstrap();
        
        view()->share(compact('mucgia','hangsp'));
    }
}
