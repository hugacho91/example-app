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
    'contraparte' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['numero_expediente','fecha_entrada','iniciador','contraparte','motivo','extracto','antecedentes','agregados','delegacion_id','seccion_id','user_id','estado','otro','numero_dictamen','dictamen','pase'];

    public function archivos()
    {
        return $this->hasMany(Archivo::class);
    }

    public function delegacione(){
      return $this->hasOne('App\Models\Delegacione','id','delegacion_id');
    }

    public function seccione(){
      return $this->hasOne('App\Models\Seccione','id','seccion_id');
    }

    public function user(){
      return $this->hasOne('App\Models\User','id','user_id');
    }
    

}
