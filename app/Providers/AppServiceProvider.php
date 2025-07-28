<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use App\Models\Carrera;

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
        View::composer(['carreras.*', 'banca.*'], function ($view) {
            $carreraId = Cache::get('carrera_actual_id');

            // Si no hay una carrera definida, escoge una por defecto (ej: la primera)
            $proximaCarrera = $carreraId ? Carrera::find($carreraId) : Carrera::first();

            $view->with('proximaCarrera', $proximaCarrera);
        });
    }
}
