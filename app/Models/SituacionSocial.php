<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SituacionSocial extends Model
{
    use HasFactory;

    public $fillable = ['nombre','observaciones'];
}
