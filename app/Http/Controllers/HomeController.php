<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use App\Sucursal;
use App\UsuarioSucursal;
use App\UsuarioAccion;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
    *Controlador del menu
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     $this->middleware('auth');
  
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
/*
        $usuario=User::leftjoin('persona_fisica', 'usuario.id_persona_fisica', '=', 'persona_fisica.id')
        ->leftjoin('dato_personal', 'persona_fisica.id_dato_personal', '=', 'dato_personal.id')
        ->leftjoin('elemento_policial', 'elemento_policial.id_persona_fisica', '=', 'persona_fisica.id')
        ->leftjoin('sucursal_historico', 'elemento_policial.id', '=', 'sucursal_historico.id_elemento_policial')
        ->leftjoin('sucursal', 'sucursal.id', '=', 'sucursal_historico.id_sucursal')

        ->where('sucursal_historico.version','0') //quitar cuando ya esten llenas las tablas

        //->where('usuario.username','like','s%')
        ->where('usuario.username','like','%%')
             ->select('usuario.id','usuario.username','dato_personal.nombre','dato_personal.apellido_paterno','dato_personal.apellido_materno','sucursal.nombre','elemento_policial.administrativo')

        //'dato_personal.nombre','dato_personal.apellido_paterno','dato_personal.apellido_materno','sucursal.nombre_sucursal','elemento_policial.administrativo
        ->get();
        dd($usuario);
    */
        return view('home');
    }

//datos para mostrar el modal de seleccion de sucursal
    public function verificarSucursales()
{
     $usuario = User::find(Auth::user()->id);
     $succ=UsuarioSucursal::where('id_usuario','=',$usuario->id)
     ->join('sucursal','usuario_sucursal.id_sucursal','=','sucursal.id')
     ->select('sucursal.id','sucursal.nombre')
     ->get();

         return $succ;
}

    public function verificarModulos()
{
     $usuario = User::find(Auth::user()->id);
     $departamentos=UsuarioAccion::where('id_usuario','=',$usuario->id)
     ->join('accion', 'usuario_accion.id_accion', '=', 'accion.id')
     ->join('departamento', 'accion.id_departamento', '=', 'departamento.id')
     ->groupBy('departamento.id')
     ->select('departamento.id')
     ->get();

         return $departamentos;
}

    public function setSucursal($sucursal)
    {
        
        
        $usuario = User::find(Auth::user()->id);
        $usuario->id_sucursal_activa=$sucursal;
        $usuario->save();

            
        
        
    }


        public function getSucursal()
    {   
        $usuario = User::find(Auth::user()->id);

        $succ=Sucursal::where('id','=',$usuario->id_sucursal_activa)
     ->select('sucursal.id','sucursal.nombre')
     ->get();
    
     if(sizeof($succ)==0)
     {
         $succ=array();
        $succ[0]['id']=0;
        $succ[0]['nombre']='';
     }


        return $succ;
    }


}
