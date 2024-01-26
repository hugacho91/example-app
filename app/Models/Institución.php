<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Institución
 *
 * @property $id
 * @property $nombre
 * @property $ciudad
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Institución extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'ciudad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','ciudad'];



}
