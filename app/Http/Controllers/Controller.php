<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\UsuarioAccion;
use Carbon\Carbon;
use App\Historial;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
public function verificarPermiso($accion)
{
	 $usuario = User::find(Auth::user()->id);
	 $acc=UsuarioAccion::where('id_accion','=',$accion)
	 ->where('id_usuario','=',$usuario->id)
	 ->first();

		 if($acc==null)
		 {
		 	 return false;
		 }
		 else
		 {
		 	return true;
		 }
}

public function historial($accion,$detalle)
{
	 	$usuario = User::find(Auth::user()->id);

	  	$historial = new Historial;
        $historial->fecha=Carbon::now();
        $historial->id_usuario=$usuario->id;
        $historial->id_accion=$accion;
        $historial->id_acceso=$usuario->id_acceso;
        $historial->detalle=$detalle;
        $historial->save();

}


public function mesAletra($mes)
    {
    	        switch ($mes) {
            case '1':
                $m="enero";
                break;
            case '2':
                $m="febrero";
                break;
            case '3':
                $m="marzo";
                break;
            case '4':
                $m="abril";
                break;
            case '5':
                $m="mayo";
                break;
            case '6':
                $m="junio";
                break;
            case '7':
                $m="julio";
                break;
            case '8':
                $m="agosto";
                break;
            case '9':
                $m="septiembre";
                break;
            case '10':
                $m="octubre";
                break;
            case '11':
                $m="noviembre";
                break;
            case '12':
                $m="diciembre";
                break;

            
            
        }

        return $m;
    }



}
