<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('competidores_mock', function (Blueprint $table) {
            $table->id();
            $table->integer('peso');               // en kg
            $table->integer('tamaño');             // en cm
            $table->integer('victorias_previas');  // número de victorias
            $table->integer('carreras_totales');   // total de carreras
            $table->decimal('velocidad_promedio', 5, 2); // en m/s o km/h
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competidores_mock');
    }
};
