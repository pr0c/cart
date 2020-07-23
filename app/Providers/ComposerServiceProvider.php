<?php

namespace App\Providers;

use App\Models\ShopCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {
    public function boot() {
        View::composer('header', function ($view) {
            if(Auth::check()) {
                $view->with('cartCount', count(Auth::user()->cart));
            }
        });

        View::composer('shop.categories', function($view) {
            $view->with('categories', ShopCategory::with(['child', 'parent'])->get());
        });
    }
}
