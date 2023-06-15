<?php

namespace Zalkarz\CookieBasedAuth;

use Illuminate\Support\ServiceProvider;

class CookieBasedAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'cookie-based-auth');
        
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/cookie-based-auth')
        ]);
    }
    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
        __DIR__.'/../config/cookie-based-auth.php', 'cookie-based-auth'
        ); 
    }
}