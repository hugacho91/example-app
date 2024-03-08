<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $fillable = ['nombre', 'ruta', 'expediente_id'];

    // Relación con el expediente
    public function expediente()
    {
        return $this->belongsTo(Expediente::class);
    }
}