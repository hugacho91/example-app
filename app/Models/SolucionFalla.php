<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SolucionFalla
 *
 * @property $id
 * @property $fecha
 * @property $expediente
 * @property $numero_falla
 * @property $empleador
 * @property $empleado
 * @property $estado
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SolucionFalla extends Model
{
    
    static $rules = [
		'fecha' => 'required',
		'expediente' => 'required',
		'numero_falla' => 'required',
		'empleador' => 'required',
		'empleado' => 'required',
		'estado' => 'required',
		'descripcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','expediente','numero_falla','empleador','empleado','estado','descripcion'];



}
