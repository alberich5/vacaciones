<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
   
    /**
     * The database table used by the model.
     *
     * @var string
     */

    
    protected $table = 'sucursal';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id',
    'nombre' ,
    'id_sucursal_depende',
    'id_elemento_encargado',
    'numero_nomina',
    'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
