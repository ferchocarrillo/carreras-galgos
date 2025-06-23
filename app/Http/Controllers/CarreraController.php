<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\CarreraFinalizada;


class CarreraController extends Controller
{

    public function index()
    {
        $proximasCarreras = Carrera::inRandomOrder()
            ->limit(1)
            ->get();
    
        $carrerasFinalizadasDB = CarreraFinalizada::join('carreras', 'carreras_finalizadas.carrera_id', '=', 'carreras.carrera_id')
        ->orderBy('carreras_finalizadas.fecha_finalizacion', 'desc') 
        ->distinct('carreras_finalizadas.carrera_id')
        ->take(5)
        ->get(['carreras_finalizadas.carrera_id', 'carreras_finalizadas.fecha_finalizacion']);
            $carrerasFinalizadasFormateadas = $carrerasFinalizadasDB->map(function ($carrera) {
                $ganadores = Carrera::where('carrera_id', $carrera->carrera_id)
                    ->orderBy('posicion_llegada', 'asc')
                    ->take(3)
                    ->get(['nombre', 'posicion_salida', 'posicion_llegada']);
        
                $ganador1 = $ganadores->get(0);
                $ganador2 = $ganadores->get(1);
                $ganador3 = $ganadores->get(2);
        
                return [
                    'carrera_id' => $carrera->carrera_id,
                    'fecha_finalizacion' => $carrera->fecha_finalizacion,
                    'ganador_posicion_1' => $ganador1 ? $ganador1->nombre : null,
                    'ganador_posicion_1_salida' => $ganador1 ? $ganador1->posicion_salida : null,
                    'ganador_posicion_1_llegada' => $ganador1 ? $ganador1->posicion_llegada : null,
                    'ganador_posicion_2' => $ganador2 ? $ganador2->nombre : null,
                    'ganador_posicion_2_salida' => $ganador2 ? $ganador2->posicion_salida : null,
                    'ganador_posicion_2_llegada' => $ganador2 ? $ganador2->posicion_llegada : null,
                    'ganador_posicion_3' => $ganador3 ? $ganador3->nombre : null,
                    'ganador_posicion_3_salida' => $ganador3 ? $ganador3->posicion_salida : null,
                    'ganador_posicion_3_llegada' => $ganador3 ? $ganador3->posicion_llegada : null,
                ];
            })->toArray();
        
            return response()->json([
                'proximas_carreras' => $proximasCarreras->map(function ($carrera) {
                    return [
                        'carrera_id' => $carrera->carrera_id,
                        'participantes' => Carrera::where('carrera_id', $carrera->carrera_id)
                            ->orderBy('posicion_salida')
                            ->get(['nombre', 'posicion_salida']),
                        'video_path' => $carrera->video_path,
                    ];
                }),
                'carreras_finalizadas' => $carrerasFinalizadasFormateadas,
            ]);
        }

        public function guardarCarreraFinalizada(Request $request)
        {
            $carreraId = $request->input('carrera_id');
            $ganador1Nombre = $request->input('ganador_posicion_1');
            $ganador2Nombre = $request->input('ganador_posicion_2');
            $ganador3Nombre = $request->input('ganador_posicion_3');
            $carreraFinalizada = new CarreraFinalizada();
            $carreraFinalizada->carrera_id = $carreraId;
            $carreraFinalizada->fecha_finalizacion = now();
            $carreraFinalizada->ganador_posicion_1 = $ganador1Nombre;
            $carreraFinalizada->ganador_posicion_2 = $ganador2Nombre;
            $carreraFinalizada->ganador_posicion_3 = $ganador3Nombre;
            $ganadoresSalida = Carrera::where('carrera_id', $carreraId)
                ->whereIn('nombre', [$ganador1Nombre, $ganador2Nombre, $ganador3Nombre])
                ->orderByRaw("FIELD(nombre, ?, ?, ?)", [$ganador1Nombre, $ganador2Nombre, $ganador3Nombre])
                ->pluck('posicion_salida', 'nombre')
                ->toArray();
            // **Opcional: Guardar las posiciones de salida si es tu intención**
            $carreraFinalizada->ganador_posicion_1 = $ganadoresSalida[$ganador1Nombre] ?? null;
            $carreraFinalizada->ganador_posicion_2 = $ganadoresSalida[$ganador2Nombre] ?? null;
            $carreraFinalizada->ganador_posicion_3 = $ganadoresSalida[$ganador3Nombre] ?? null;
            $carreraFinalizada->save();
            return response()->json(['message' => 'Información de carrera finalizada guardada con éxito']);
        }

    public function obtenerDetallesCarrera($carrera_id)
    {
        $carrera = Carrera::where('carrera_id', $carrera_id)->first(['pista', 'metros_pista']);

        if ($carrera) {
            return response()->json($carrera);
        } else {
            return response()->json(['error' => 'Carrera no encontrada'], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
