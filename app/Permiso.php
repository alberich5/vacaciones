<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
       /**
     * The database table used by the model.
     *
     * @var string
     */

    protected $connection='pgsql';
    protected $table = 'permiso';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [    'version' ,
  'activo',
  'fecha_final',
  'fecha_inicial' ,
  'fecha_registro',
  'fecha_reincorporacion',
  'fecha_update',
  'num_dias' ,
  'usuario_actualiza_id',
  'usuario_registro_id' ,
  'fecha_solicitud' ,
  'oficio' ,
  'tipo' ,
  'num_meses' ,
  'num_anios' ,
  'elemento_policial_id',
  'archivo_baja',
  'fecha_cancelacion',
  'nombre_archivo_baja' ,
  'oficio_baja' ,
  'tipo_archivo_baja',
  'usuario_cancela_id'

    ];





    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       
    ];
}
