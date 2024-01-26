<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Institucione
 *
 * @property $id
 * @property $nombre
 * @property $ubicacion
 * @property $descripcion
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Institucione extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'ubicacion' => 'required',
		'descripcion' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','ubicacion','descripcion','estado'];



}
