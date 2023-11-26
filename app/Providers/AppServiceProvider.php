<?php

namespace App\Providers;

use App\Utilities\ShopifyRoute;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Utilities\SessionToken;
use Osiset\ShopifyApp\Macros\TokenRoute;

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
        UrlGenerator::macro('shopifyRoute', new ShopifyRoute());
        Blade::directive('sessionToken', new SessionToken());
    }
}
