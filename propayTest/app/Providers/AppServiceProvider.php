<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
//Pagination issue
use Illuminate\Pagination\Paginator;


class AppServiceProvider extends ServiceProvider
{
    //Register any application services.
    public function register()
    {
        //
    }

    //Bootstrap any application services.
    public function boot()
    {
        Schema::defaultStringLength(100);
        Paginator::useBootstrap();

    }
}
