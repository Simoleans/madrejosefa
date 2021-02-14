<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    use HasFactory;

    public $fillable = [
    'nombres',
    'apellido_materno',
    'apellido_paterno',
    'direccion',
    'estado_civil',
    'fecha_nac',
    'nivel_instruccion',
    'pais_origen',
    'nro_documento',
    'status'
    ];

    public function getFullNameAttribute()
{
    return "{$this->nombres} {$this->apellido_paterno} {$this->apellido_materno}";
}
}
