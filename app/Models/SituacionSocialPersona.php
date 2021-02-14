<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SituacionSocialPersona extends Model
{
    use HasFactory;

    public $fillable = ['persona_id','situacion_id'];
}
