<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SituacionProfesional extends Model
{
    use HasFactory;

    public $fillable = ['nombre','observaciones'];
}
