<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioAccion extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */

    
    protected $table = 'usuario_accion';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_usuario',  'id_accion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
