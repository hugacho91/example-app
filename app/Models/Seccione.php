<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Seccione
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Seccione extends Model
{
    
    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];

    public function expediente(){
      return $this->hasMany('App/Models/Expediente','seccion_id','id');
    }


}
