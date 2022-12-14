<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
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
        Paginator::useBootstrap();
        Blade::if('admin', function () {
            return @auth()->user() && auth()->user()->type == '1';
        });

        Blade::if('user', function () {
            return @auth()->user() && auth()->user()->type == '0';
        });

        Gate::define('access', function(User $user, $type) {
            return ($user->id == $type);
        });
    }
}
