<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\BancaController;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('carreras.principal'); // Carga la vista principal
})->name('inicio');

Route::resource('carreras', CarreraController::class)->except(['index', 'create', 'store', 'edit', 'update', 'destroy']);
Route::get('banca', [BancaController::class, 'index'])->name('banca.panel');

Route::get('/competidores-random', function () {
    $competidores = DB::table('competidores_mock')
        ->inRandomOrder()
        ->take(6)
        ->get();

    return response()->json($competidores);
});