<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InformeFalla
 *
 * @property $id
 * @property $fecha
 * @property $empleado
 * @property $empleador
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class InformeFalla extends Model
{
    
    static $rules = [
		'fecha' => 'required',
		'empleado' => 'required',
		'empleador' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','empleado','empleador','estado'];



}
