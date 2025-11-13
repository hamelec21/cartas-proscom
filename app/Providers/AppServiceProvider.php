<?php

namespace App\Providers;

use App\Models\Restaurante;
use App\Observers\RestauranteObserver;

use Illuminate\Support\ServiceProvider;

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
        Restaurante::observe(RestauranteObserver::class);
    }
}
