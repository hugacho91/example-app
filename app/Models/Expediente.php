<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Expediente
 *
 * @property $id
 * @property $numero_expediente
 * @property $fecha_entrada
 * @property $iniciador
 * @property $extracto
 * @property $antecedentes
 * @property $agregados
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Expediente extends Model
{
    
    static $rules = [
		'numero_expediente' => 'required',
		'fecha_entrada' => 'required',
		'iniciador' => 'required',
		'extracto' => 'required',
		'antecedentes' => 'required',
		'agregados' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['numero_expediente','fecha_entrada','iniciador','extracto','antecedentes','agregados'];

    public function archivos()
    {
        return $this->hasMany(Archivo::class);
    }

}
