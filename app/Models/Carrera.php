<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    protected $table = 'carreras';

    protected $fillable = [
        'carrera_id',
        'nombre',
        'posicion_salida',
        'posicion_llegada',
        'pista',
        'metros_pista',
        'video_path'
    ];
  
}