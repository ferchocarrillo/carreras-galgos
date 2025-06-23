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
        Schema::create('carreras', function (Blueprint $table) {
            $table->id(); // 'id' será la clave primaria autoincremental
            $table->unsignedBigInteger('carrera_id'); // Para agrupar los 6 participantes
            $table->string('nombre'); // Nombre del galgo
            $table->integer('posicion_salida')->nullable();
            $table->integer('posicion_llegada')->nullable();
            $table->string('pista')->nullable();
            $table->integer('metros_pista')->nullable();
            $table->string('video_path')->nullable();
            $table->timestamps();

            $table->index('carrera_id'); // Añadimos un índice para facilitar las búsquedas por grupo de carrera
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carreras');
    }
};