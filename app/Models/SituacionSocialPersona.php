<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SituacionSocialPersona extends Model
{
    use HasFactory;

    public $fillable = ['persona_id','situacion_id'];

    public function situacion()
    {
        return $this->belongsto(SituacionMorbida::class,'situacion_id');
    }
}
