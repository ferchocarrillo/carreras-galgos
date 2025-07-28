<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarreraController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

    Route::get('/carreras/data', [CarreraController::class, 'index'])
        ->name('api.carreras.data');

    Route::post('/carreras/guardar-finalizada', [CarreraController::class, 'guardarCarreraFinalizada'])
        ->name('api.carreras.guardar_finalizada');

    Route::get('/carreras/{carrera_id}/detalles', [CarreraController::class, 'obtenerDetallesCarrera'])
        ->name('api.carreras.detalles'); // Agregué un nombre de ruta para consistencia
    Route::get('/api/carrera-activa', [CarreraController::class, 'carreraActiva']);