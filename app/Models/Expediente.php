<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Expediente
 *
 * @property $id
 * @property $fecha
 * @property $fecha_cierre
 * @property $empleador
 * @property $empleado
 * @property $cuit_empleado
 * @property $dni_empleado
 * @property $estado
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Expediente extends Model
{
    
    static $rules = [
		'fecha' => 'required',
		'fecha_cierre' => 'required',
		'empleador' => 'required',
		'empleado' => 'required',
		'cuit_empleado' => 'required',
		'dni_empleado' => 'required',
		'estado' => 'required',
		'descripcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','fecha_cierre','empleador','empleado','cuit_empleado','dni_empleado','estado','descripcion'];



}
