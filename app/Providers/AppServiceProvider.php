<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route; // Añade esta línea

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // ... (tu código existente en register)
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}