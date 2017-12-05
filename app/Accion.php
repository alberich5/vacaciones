<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accion extends Model
{
      /**
     * The database table used by the model.
     *
     * @var string
     */

    
    protected $table = 'accion';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id',
        'id_departamento',  'nombre','recurso','operacion','controlador'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
