<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarreraFinalizada extends Model
{
    use HasFactory;

    protected $table = 'carreras_finalizadas';
    protected $fillable = [
        'carrera_id', 
        'fecha_finalizacion', 
        'ganador_posicion_1', 
        'ganador_posicion_2', 
        'ganador_posicion_3'
    ];
    protected $casts = [
        'fecha_finalizacion' => 'datetime',
    ];
}