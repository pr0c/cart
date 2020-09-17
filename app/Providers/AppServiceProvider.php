<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
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
    public function boot()
    {
        Blade::if('access', function ($rule) {
            $user = Auth::user();
            $condition = explode(':', $rule);
            
            if($condition[0] == 'permission' && $user->hasPermission($condition[1])) return true;
            else if($condition[0] == 'role' && $user->hasRole($condition[1])) return true;
            else if($user->hasPermission('root')) return true;

            return false;
        });
    }
}
