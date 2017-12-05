<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioSucursal extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */

    
    protected $table = 'usuario_sucursal';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_usuario',  'id_sucursal'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
