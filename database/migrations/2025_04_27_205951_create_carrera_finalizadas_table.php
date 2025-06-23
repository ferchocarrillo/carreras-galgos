<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('carreras_finalizadas', function (Blueprint $table) {
            $table->id();
            $table->string('carrera_id')->index();
            $table->timestamp('fecha_finalizacion')->nullable();
            $table->string('ganador_posicion_1')->nullable();
            $table->string('ganador_posicion_2')->nullable();
            $table->string('ganador_posicion_3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrera_finalizadas');
    }
};
