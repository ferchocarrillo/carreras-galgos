<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CompetidoresMockSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 100; $i++) {
            $carrerasTotales = rand(5, 30);
            $victorias = rand(0, $carrerasTotales);

            DB::table('competidores_mock')->insert([
                'peso' => rand(22, 35), // peso en kg típico de galgo
                'tamaño' => rand(60, 75), // altura en cm
                'victorias_previas' => $victorias,
                'carreras_totales' => $carrerasTotales,
                'velocidad_promedio' => rand(600, 750) / 10, // 60.0 a 75.0 km/h
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}