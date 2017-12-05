<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
        /**
     * The database table used by the model.
     *
     * @var string
     */

         protected $connection='pgsqlLocal';
    protected $table = 'usuario';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id',
        'username',  
        'password',
        'habilitado',
        'bloqueado',
        'id_acceso',
        'id_persona_fisica',
        'id_sucursal_activa'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
