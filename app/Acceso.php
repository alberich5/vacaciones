<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acceso extends Model
{
       /**
     * The database table used by the model.
     *
     * @var string
     */

        protected $connection='pgsqlLocal';
    protected $table = 'acceso';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id',
        'id_usuario',  'fecha_acceso','fecha_exit'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       
    ];
}
