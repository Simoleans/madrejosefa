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

    public function parentescos()
    {
        return $this->hasMany(Parentesco::class,'persona_id');
    }

    public function s_morbida()
    {
        return $this->hasMany(SituacionMorbidaPersona::class,'persona_id');
    }

    public function s_profesional()
    {
        return $this->hasMany(SituacionProfesionalPersona::class,'persona_id');
    }

    public function s_social()
    {
        return $this->hasMany(SituacionSocialPersona::class,'persona_id');
    }
}
