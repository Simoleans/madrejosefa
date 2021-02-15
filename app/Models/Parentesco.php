<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parentesco extends Model
{
    use HasFactory;

    public $fillable = ['user_id','persona_id','parentesco'];

    public function persona()
    {
        return $this->belongsTo(Personas::class);
    }

    public function user()
    {
        return $this->belongsTo(Personas::class,'user_id');
    }
}
