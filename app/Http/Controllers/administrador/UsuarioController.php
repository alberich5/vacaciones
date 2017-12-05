<?php

namespace App\Http\Controllers\administrador;

use Illuminate\Http\Request;
use App\User;
use App\Elemento_policial;
use App\Historial;
use App\Accion;
use App\Permiso;
use App\PermisoLocal;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Response;

class UsuarioController extends Controller
{

        /**
    *Controlador del menu
     * Create a new controller instance.
     *
     * @return void
     */
    

    public function __construct()
    {
      //  $this->middleware('cerrar');
  
        $this->middleware('auth');
    }

    public function getUsuarios() {

       //  $usuarios = User::find(Auth::user()->id);
      //$usuarios= User::all();
      $usuarios=DB::select("select distinct
elementos_policiales.id as id_elemento,
elementos_policiales.estatus,
elementos_policiales.nombre,
elementos_policiales.apellido_paterno,
elementos_policiales.apellido_materno,
elementos_policiales.fecha_inicio_laboral,
elementos_policiales.fecha_nacimiento,
elementos_policiales.sub_delegacion

from elementos_policiales
inner join permiso on elementos_policiales.id=permiso.elemento_policial_id 
where permiso.tipo='vacaciones' and elementos_policiales.activo='SI'  
and elementos_policiales.estatus in ('Candidato Historico','Candidato Contratado') 

");
      /*
        and elementos_policiales.sub_delegacion in 
        $usuarios=User::leftjoin('persona_fisica', 'usuario.id_persona_fisica', '=', 'persona_fisica.id')
        ->leftjoin('dato_personal', 'persona_fisica.id_dato_personal', '=', 'dato_personal.id')
        ->leftjoin('elemento_policial', 'elemento_policial.id_persona_fisica', '=', 'persona_fisica.id')
        ->leftjoin('sucursal_historico', 'elemento_policial.id', '=', 'sucursal_historico.id_elemento_policial')
        ->leftjoin('sucursal', 'sucursal.id', '=', 'sucursal_historico.id_sucursal')

        ->where('sucursal_historico.version','0') //quitar cuando ya esten llenas las tablas

      

        ->select('usuario.id','usuario.username','dato_personal.nombre','dato_personal.apellido_paterno','dato_personal.apellido_materno','sucursal.nombre as nombre_sucursal','elemento_policial.administrativo')

        //'dato_personal.nombre','dato_personal.apellido_paterno','dato_personal.apellido_materno','sucursal.nombre_sucursal','elemento_policial.administrativo
        ->get();
*/
        return $usuarios;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $usuario=DB::select("select distinct
elementos_policiales.id as id_elemento,
elementos_policiales.estatus,
elementos_policiales.nombre,
elementos_policiales.apellido_paterno,
elementos_policiales.apellido_materno,
elementos_policiales.fecha_inicio_laboral,
elementos_policiales.fecha_nacimiento,
elementos_policiales.sub_delegacion

from elementos_policiales
inner join permiso on elementos_policiales.id=permiso.elemento_policial_id 
where permiso.tipo='vacaciones' and 
elementos_policiales.id=3161 and elementos_policiales.activo='SI'  
and elementos_policiales.estatus in ('Candidato Historico','Candidato Contratado')");
        
        dd( $usuario);

        $fecha='1990-06-22';

        $fechaInicioVacaciones= explode('-', $fecha);
        
        $fechaIV = Carbon::create($fechaInicioVacaciones[0], $fechaInicioVacaciones[1], $fechaInicioVacaciones[2], 12); 
        $fechaTerminoVacaciones=$fechaIV->addDays(4);
        $fechaReincorporacionVacaciones= $fechaTerminoVacaciones->addDay(); 

        $informacion=array();
        $informacion['fechaTerminoVacaciones']=$fechaTerminoVacaciones->toDateString(); 
        $informacion['fechaReincorporacionVacaciones']=$fechaReincorporacionVacaciones->toDateString(); 
        dd($informacion);

        */
        return view('administrador.usuario.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //formulario
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function historialUsuario(Request $request)
    {

$accesos=DB::connection('pgsqlLocal')->select("select 

permiso.id as id_permiso,
permiso.tipo as asunto,
permiso.oficio,
permiso.fecha_solicitud,
permiso.elemento_policial_id,
permiso.fecha_inicial,
permiso.fecha_final,
permiso.fecha_reincorporacion,
permiso.num_dias,
permiso.num_meses,
permiso.num_anios 

from permiso 
where permiso.activo=true and permiso.tipo='vacaciones' and 
 permiso.elemento_policial_id=".$request['usuario'] );


for ($i=0; $i <sizeof($accesos) ; $i++) { 
  //$accesos[$i]->fecha_inicial=substr($accesos[$i]->fecha_inicial, 10); 
  $date = new \DateTime($accesos[$i]->fecha_inicial);
 $accesos[$i]->fecha_inicial= $date->format('d-m-Y');

 $date1 = new \DateTime($accesos[$i]->fecha_final);
 $accesos[$i]->fecha_final= $date1->format('d-m-Y');
}



       // $usuario=$request['usuario'];
        /*
        $accesos=User::leftjoin('acceso', 'usuario.id', '=', 'acceso.id_usuario')
        ->where('usuario.id','=',$request['usuario'])
        ->select('usuario.id','acceso.fecha_acceso','acceso.fecha_exit' )
         ->get();
        */
        return $accesos;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUsuario(Request $request)
    {




       // $usuario=$request['usuario'];
        
        $usuario=User::leftjoin('usuario_accion', 'usuario.id', '=', 'usuario_accion.id_usuario')
        ->leftjoin('accion', 'usuario_accion.id_accion', '=', 'accion.id')
        ->leftjoin('departamento', 'accion.id_departamento', '=', 'departamento.id')
        ->where('usuario.id','=',$request['usuario'])
        ->select('usuario.id','usuario.username','accion.nombre as accion_nombre','departamento.nombre as departamento_nombre' )
         ->get();
        
        return $usuario;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function getUsuarioPermisos(Request $request)
    {



     
    }


    public function editUsuario(Request $request)
    {
        $usuario=DB::select("select distinct
elementos_policiales.id as id_elemento,
elementos_policiales.estatus,
elementos_policiales.nombre,
elementos_policiales.apellido_paterno,
elementos_policiales.apellido_materno,
elementos_policiales.fecha_inicio_laboral,
elementos_policiales.fecha_nacimiento,
elementos_policiales.sub_delegacion

from elementos_policiales
inner join permiso on elementos_policiales.id=permiso.elemento_policial_id 
where permiso.tipo='vacaciones' and 
elementos_policiales.id=".$request['usuario']." and elementos_policiales.activo='SI'  
and elementos_policiales.estatus in ('Candidato Historico','Candidato Contratado') limit 1")
   ;
$anio=Carbon::now()->year;
$diasUtilizados=DB::select("select sum(num_dias) as dias from permiso where fecha_final>='".$anio."-01-01'
and elemento_policial_id=".$request['usuario']);

$diasUtilizadosLocal=PermisoLocal::where('fecha_final','>',"2017-01-01")
->where('elemento_policial_id','=',$request['usuario'])
->sum('num_dias');

//\Log::info($diasUtilizadosLocal);
$diasUtilizadosLE=$diasUtilizados[0]->dias+$diasUtilizadosLocal;
$informacion=array();
$informacion['usuario']=$usuario;

$informacion['diasUtilizados']=20-$diasUtilizadosLE;
   

      
        //$usuario=User::findOrFail($request['usuario']);
        return $informacion;

    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function calcularFecha(Request $request)
    {
       // $fechaInicioVacaciones=$request['fechaInicioVacaciones'].split('-');
        //$request['fechaInicioVacaciones']='2017-11-08';

        $fechaInicioVacaciones= explode('-', $request['fechaInicioVacaciones']);
        
        $fechaIV = Carbon::create($fechaInicioVacaciones[0], $fechaInicioVacaciones[1], $fechaInicioVacaciones[2], 12); 
        $fechaTerminoVacaciones=$fechaIV->addDays($request['diasVacaciones']-1);

        $fechaRV = Carbon::create($fechaInicioVacaciones[0], $fechaInicioVacaciones[1], $fechaInicioVacaciones[2], 12); 
        $fechaReincorporacionVacaciones= $fechaRV->addDays($request['diasVacaciones']);



        $informacion=array();
        
        $informacion['fechaTerminoVacaciones']=$fechaTerminoVacaciones->format('Y-m-d');   
        $informacion['fechaReincorporacionVacaciones']=$fechaReincorporacionVacaciones->format('Y-m-d');  
        



     return  $informacion;
      //$request['fecha'];
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createUsuario(Request $request)
    {
     
        /*
      idElemento:this.idElemento,
                      diasVacaciones:this.diasVacaciones,
                      fechaInicioVacaciones:this.fechaInicioVacaciones,
                      fechaSolicitudVacaciones:this.fechaSolicitudVacaciones,
                      oficioVacaciones:this.oficioVacaciones,
                      fechaTerminoVacaciones:this.fechaTerminoVacaciones,
                      fechaReincorporacionVacaciones:this.fechaReincorporacionVacaciones

        */




                    //  \Log::info($request->all());
                      $permisoLocal=new PermisoLocal;
                      $permisoLocal->elemento_policial_id=$request['idElemento'];
                      $permisoLocal->num_dias=$request['diasVacaciones'];
                      $permisoLocal->fecha_inicial=$request['fechaInicioVacaciones'];
                      $permisoLocal->fecha_solicitud=$request['fechaSolicitudVacaciones'];
                      $permisoLocal->oficio=$request['oficioVacaciones'];
                      $permisoLocal->fecha_final=$request['fechaTerminoVacaciones'];
                      $permisoLocal->fecha_reincorporacion=$request['fechaReincorporacionVacaciones'];
                      $permisoLocal->tipo='vacaciones';
                      $permisoLocal->fecha_registro=$request['fechaInicioVacaciones'];
                    
                      $permisoLocal->usuario_registro_id=Auth::user()->id;
                      $permisoLocal->activo=true;
                      $permisoLocal->version=0;
                      $permisoLocal->save();


                      return $permisoLocal->id;
                      /*
                      $usuario=DB::select("select * from usuario where username='".Auth::user()->username."'");
                      \Log::info($usuario);
                      $id=DB::select("select id from permiso order by id desc limit 1");


                      $permiso=new Permiso;
                      //$permiso->id=$id[0]->id+1;
                      $permiso->elemento_policial_id=$request['idElemento'];
                      $permiso->num_dias=$request['diasVacaciones'];
                      $permiso->fecha_inicial=$request['fechaInicioVacaciones'];
                      $permiso->fecha_solicitud=$request['fechaSolicitudVacaciones'];
                      $permiso->oficio=$request['oficioVacaciones'];
                      $permiso->fecha_final=$request['fechaTerminoVacaciones'];
                      $permiso->fecha_reincorporacion=$request['fechaReincorporacionVacaciones'];
                      $permiso->tipo='vacaciones';
                      $permiso->fecha_registro=$request['fechaInicioVacaciones'];
                    
                      $permiso->usuario_registro_id=$usuario[0]->id;
                      $permiso->activo=true;
                      $permiso->version=0;
                      $permiso->save();
*/
                     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //No se elimina solo se desactiva la cuenta
       /* $usuario=User::findOrFail($id);
        $usuario->bloqueado='true';
        $usuario->save();
       */
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \searchUsuarioIlluminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchUsuario(Request $request)
    {

   
        if($request['usuario']['id']!='')
{
$usuario=DB::select("select distinct
elementos_policiales.id as id_elemento,
elementos_policiales.estatus,
elementos_policiales.nombre,
elementos_policiales.apellido_paterno,
elementos_policiales.apellido_materno,
elementos_policiales.fecha_inicio_laboral,
elementos_policiales.fecha_nacimiento,
elementos_policiales.sub_delegacion

from elementos_policiales

where 
elementos_policiales.id=".$request['usuario']['id']." and elementos_policiales.activo='SI'  
and elementos_policiales.estatus in ('Candidato Historico','Candidato Contratado')

");
}
else
{
$usuario=DB::select("select distinct
elementos_policiales.id as id_elemento,
elementos_policiales.estatus,
elementos_policiales.nombre,
elementos_policiales.apellido_paterno,
elementos_policiales.apellido_materno,
elementos_policiales.fecha_inicio_laboral,
elementos_policiales.fecha_nacimiento,
elementos_policiales.sub_delegacion

from elementos_policiales

where 

 elementos_policiales.rfc like '%".strtoupper($request['usuario']['rfc'])."%' 
and elementos_policiales.nombre like '%".strtoupper($request['usuario']['nombre'])."%' 
and elementos_policiales.apellido_paterno like '%".strtoupper($request['usuario']['paterno'])."%' 
and elementos_policiales.apellido_materno like '%".strtoupper($request['usuario']['materno'])."%'
and elementos_policiales.activo='SI'  
and elementos_policiales.estatus in ('Candidato Historico','Candidato Contratado')
");
}//fin else

//permisos


$informacion=array();
$informacion['usuario']=$usuario;
//$informacion['permisos']=$permisos;
    return $informacion;



        
    }



        public function download($idpermiso)
    {
    /*

    */

     $id =$idpermiso;//request['id_permiso'];

     $permiso=DB::connection('pgsqlLocal')->select("select 

    permiso.id,
    permiso.tipo as asunto,
    permiso.oficio,
    permiso.fecha_solicitud,
    permiso.elemento_policial_id,
    permiso.fecha_inicial,
    permiso.fecha_final,
    permiso.fecha_reincorporacion,
    permiso.num_dias,
    permiso.num_meses,
    permiso.num_anios
from  permiso 
where permiso.id=".$id);



for ($i=0; $i <sizeof($permiso) ; $i++) { 
  //$accesos[$i]->fecha_inicial=substr($accesos[$i]->fecha_inicial, 10); 
  $date = new \DateTime($permiso[$i]->fecha_inicial);
 $permiso[$i]->fecha_inicial= $date->format('Y-m-d');
}



$elemento=DB::connection('pgsql')->select("select 
elementos_policiales.id,
elementos_policiales.estatus as status,
elementos_policiales.nombre,
elementos_policiales.apellido_paterno,
elementos_policiales.apellido_materno,
elementos_policiales.delegacion
from elementos_policiales
inner join permiso on  elementos_policiales.id=permiso.elemento_policial_id 
where elementos_policiales.id=".$permiso[0]->elemento_policial_id);


              // Creating the new document...
$phpWord = new \PhpOffice\PhpWord\PhpWord();

/* Note: any element you append to a document must reside inside of a Section. */

 // Adding an empty Section to the document...
$section = $phpWord->addSection();




$templateWord = new \PhpOffice\PhpWord\TemplateProcessor('plantillasDoc/oficioVacaciones.docx');
$nombre =$elemento[0]->nombre." ".$elemento[0]->apellido_paterno." ".$elemento[0]->apellido_materno;
$nombre=str_replace("  "," ",$nombre);
$anios="";
if($permiso[0]->num_anios!=0)
{
  $anios=$permiso[0]->num_anios." años ";
  if($permiso[0]->num_anios==1)
  {
  $anios=$permiso[0]->num_anios." año ";
  }

}else{}
$meses="";
if($permiso[0]->num_meses!=0)
{
$meses=$permiso[0]->num_meses." meses ";

  if($permiso[0]->num_meses==1)
  {
  $meses=$permiso[0]->num_meses." mes ";
  }
}else{}
$dias="";
if($permiso[0]->num_dias!=0)
{
$dias=$permiso[0]->num_dias." dias ";

  if($permiso[0]->num_dias==1)
  {
  $dias=$permiso[0]->num_dias." día ";
  }
}else{}

//fecha inicial
$fecha_i = Carbon::parse($permiso[0]->fecha_inicial);
$diaI=$fecha_i->format('d');
$mesI=ucwords($this->mesAletra($fecha_i->month));
$anioI=$fecha_i->year;
$fI=$diaI." de ".$mesI;
//fecha final
$fecha_f = Carbon::parse($permiso[0]->fecha_final);
$diaF=$fecha_f->format('d');
$mesF=ucwords($this->mesAletra($fecha_f->month));
$anioF=$fecha_f->year;
$fF=$diaF." de ".$mesF." del ".$anioF;
//fecha reincorporacion
$fecha_r = Carbon::parse($permiso[0]->fecha_reincorporacion);
$diaR=$fecha_r->format('d');
$mesR=ucwords($this->mesAletra($fecha_r->month));
$anioR=$fecha_r->year;
$fR=$diaR." de ".$mesR." del ".$anioR;
//fecha descarga
$fecha_d = Carbon::now();
$diaD=$fecha_d->format('d');
$mesD=ucwords($this->mesAletra($fecha_d->month));
$anioD=$fecha_d->year;
$fD=$diaD." de ".$mesD." del ".$anioD;

//nombre del cmt delegacion



switch ($elemento[0]->delegacion) {
  case 'Valles Centrales':
    $templateWord->setValue('delegacion','Delegación de Valles Centrales');
    $templateWord->setValue('nombreEncargado','CMTE. LEONARDO ORTEGA MARTINEZ');
    $templateWord->setValue('cargoEncargado','DELEGADO REGIONAL DE VALLES CENTRALES');

    break;

    case 'Pinotepa Nacional':
    $templateWord->setValue('delegacion','Delegación de Pinotepa Nacional');
    $templateWord->setValue('nombreEncargado','OFICIAL FRANCISCO TALLEDOS SILVA');
    $templateWord->setValue('cargoEncargado','DELEGADO REGIONAL DE PINOTEPA NACIONAL');

    break;

    case 'Juchitan':
    $templateWord->setValue('delegacion','Delegación de Juchitan');
    $templateWord->setValue('nombreEncargado','CMTE. JUANITO GÓMEZ GÓMEZ');
    $templateWord->setValue('cargoEncargado','DELEGADO REGIONAL DE JUCHITAN');

    break;

    case 'Tuxtepec':
    $templateWord->setValue('delegacion','Delegación de Tuxtepec');
    $templateWord->setValue('nombreEncargado','CMTE. SEVERO SILVA JACINTO');
    $templateWord->setValue('cargoEncargado','DELEGADO REGIONAL DE TUXTEPEC');

    break;


    case 'Puerto Escondido':
    $templateWord->setValue('delegacion','Delegación de Puerto Escondido');
    $templateWord->setValue('nombreEncargado','CMTE. ANDRÉS ROBERTO RAMIREZ MENDOZA');
    $templateWord->setValue('cargoEncargado','DELEGADO REGIONAL DE PUERTO ESCONDIDO');
    break;

    case 'Matias Romero': 
    $templateWord->setValue('delegacion','Delegación de Matias Romero');
    $templateWord->setValue('nombreEncargado','CMTE. JOSE SALVADOR AQUINO ROJAS');
    $templateWord->setValue('cargoEncargado','DELEGADO REGIONAL DE MATIAS ROMERO');

    break;

    case 'Huajuapan':
    $templateWord->setValue('delegacion','Delegación de Huajuapan');
    $templateWord->setValue('nombreEncargado','CMTE. ALBERTO CONTRERAS GARCÍA');
    $templateWord->setValue('cargoEncargado','DELEGADO REGIONAL DE HUAJUAPAN');

    break;
  
  default:
    # code...
    break;
}
$templateWord->setValue('oficio',$permiso[0]->oficio);
$templateWord->setValue('fechaDescarga',$fD);
$templateWord->setValue('nombreElemento',$nombre);
$templateWord->setValue('num_anios',$anios);
$templateWord->setValue('num_meses',$meses);
$templateWord->setValue('num_dias',$dias);
$templateWord->setValue('fecha_inicial',$fI);
$templateWord->setValue('fecha_final',$fF);
$templateWord->setValue('fecha_reincorporacion',$fR);
$templateWord->setValue('nombreComandante',"LEONARDO ORTEGA MARTINEZ");
// --- Guardamos el documento
$templateWord->saveAs('oficioVacaciones.docx');
//$this->historial('Descarga de oficio de alta del elemento '.$id);
$nombreDocumento=$elemento[0]->apellido_paterno." ".$elemento[0]->apellido_materno." ".$elemento[0]->nombre;
$nombreDocumento=str_replace("  "," ",$nombreDocumento);
return Response::download('oficioVacaciones.docx',$nombreDocumento.'.docx');



    }



        public function prueba()
    {
    /*

    */
     $id =18;




/*conmsulta completa reemplaza

$elemento=DB::select("select 
elementos_policiales.id,
elementos_policiales.estatus as status,
elementos_policiales.nombre,
elementos_policiales.apellido_paterno,
elementos_policiales.apellido_materno,
    permiso.id,
    permiso.tipo as asunto,
    permiso.oficio,
    permiso.fecha_solicitud,
    permiso.elemento_policial_id,
    permiso.fecha_inicial,
    permiso.fecha_final,
    permiso.fecha_reincorporacion,
    permiso.num_dias,
    permiso.num_meses,
    permiso.num_anios ,
    elementos_policiales.delegacion
from elementos_policiales
inner join permiso on  elementos_policiales.id=permiso.elemento_policial_id 
where permiso.id=".$id);
*/

$permiso=DB::connection('pgsqlLocal')->select("select 

    permiso.id,
    permiso.tipo as asunto,
    permiso.oficio,
    permiso.fecha_solicitud,
    permiso.elemento_policial_id,
    permiso.fecha_inicial,
    permiso.fecha_final,
    permiso.fecha_reincorporacion,
    permiso.num_dias,
    permiso.num_meses,
    permiso.num_anios
from  permiso 
where permiso.id=".$id);



for ($i=0; $i <sizeof($permiso) ; $i++) { 
  //$accesos[$i]->fecha_inicial=substr($accesos[$i]->fecha_inicial, 10); 
  $date = new \DateTime($permiso[$i]->fecha_inicial);
 $permiso[$i]->fecha_inicial= $date->format('Y-m-d');
}



$elemento=DB::connection('pgsql')->select("select 
elementos_policiales.id,
elementos_policiales.estatus as status,
elementos_policiales.nombre,
elementos_policiales.apellido_paterno,
elementos_policiales.apellido_materno,
elementos_policiales.delegacion
from elementos_policiales
inner join permiso on  elementos_policiales.id=permiso.elemento_policial_id 
where elementos_policiales.id=".$permiso[0]->elemento_policial_id);


              // Creating the new document...
$phpWord = new \PhpOffice\PhpWord\PhpWord();

/* Note: any element you append to a document must reside inside of a Section. */

 // Adding an empty Section to the document...
$section = $phpWord->addSection();




$templateWord = new \PhpOffice\PhpWord\TemplateProcessor('plantillasDoc/oficioVacaciones.docx');
$nombre =$elemento[0]->nombre." ".$elemento[0]->apellido_paterno." ".$elemento[0]->apellido_materno;
$nombre=str_replace("  "," ",$nombre);
$anios="";
if($permiso[0]->num_anios!=0)
{
  $anios=$permiso[0]->num_anios." años ";
  if($permiso[0]->num_anios==1)
  {
  $anios=$permiso[0]->num_anios." año ";
  }

}else{}
$meses="";
if($permiso[0]->num_meses!=0)
{
$meses=$permiso[0]->num_meses." meses ";

  if($permiso[0]->num_meses==1)
  {
  $meses=$permiso[0]->num_meses." mes ";
  }
}else{}
$dias="";
if($permiso[0]->num_dias!=0)
{
$dias=$permiso[0]->num_dias." dias ";

  if($permiso[0]->num_dias==1)
  {
  $dias=$permiso[0]->num_dias." día ";
  }
}else{}

//fecha inicial
$fecha_i = Carbon::parse($permiso[0]->fecha_inicial);
$diaI=$fecha_i->format('d');
$mesI=ucwords($this->mesAletra($fecha_i->month));
$anioI=$fecha_i->year;
$fI=$diaI." de ".$mesI;
//fecha final
$fecha_f = Carbon::parse($permiso[0]->fecha_final);
$diaF=$fecha_f->format('d');
$mesF=ucwords($this->mesAletra($fecha_f->month));
$anioF=$fecha_f->year;
$fF=$diaF." de ".$mesF." del ".$anioF;
//fecha reincorporacion
$fecha_r = Carbon::parse($permiso[0]->fecha_reincorporacion);
$diaR=$fecha_r->format('d');
$mesR=ucwords($this->mesAletra($fecha_r->month));
$anioR=$fecha_r->year;
$fR=$diaR." de ".$mesR." del ".$anioR;
//fecha descarga
$fecha_d = Carbon::now();
$diaD=$fecha_d->format('d');
$mesD=ucwords($this->mesAletra($fecha_d->month));
$anioD=$fecha_d->year;
$fD=$diaD." de ".$mesD." del ".$anioD;

//nombre del cmt delegacion



switch ($elemento[0]->delegacion) {
  case 'Valles Centrales':
    $templateWord->setValue('delegacion','Delegación de Valles Centrales');
    $templateWord->setValue('nombreEncargado','CMTE. LEONARDO ORTEGA MARTINEZ');
    $templateWord->setValue('cargoEncargado','DELEGADO REGIONAL DE VALLES CENTRALES');

    break;

    case 'Pinotepa Nacional':
    $templateWord->setValue('delegacion','Delegación de Pinotepa Nacional');
    $templateWord->setValue('nombreEncargado','OFICIAL FRANCISCO TALLEDOS SILVA');
    $templateWord->setValue('cargoEncargado','DELEGADO REGIONAL DE PINOTEPA NACIONAL');

    break;

    case 'Juchitan':
    $templateWord->setValue('delegacion','Delegación de Juchitan');
    $templateWord->setValue('nombreEncargado','CMTE. JUANITO GÓMEZ GÓMEZ');
    $templateWord->setValue('cargoEncargado','DELEGADO REGIONAL DE JUCHITAN');

    break;

    case 'Tuxtepec':
    $templateWord->setValue('delegacion','Delegación de Tuxtepec');
    $templateWord->setValue('nombreEncargado','CMTE. SEVERO SILVA JACINTO');
    $templateWord->setValue('cargoEncargado','DELEGADO REGIONAL DE TUXTEPEC');

    break;


    case 'Puerto Escondido':
    $templateWord->setValue('delegacion','Delegación de Puerto Escondido');
    $templateWord->setValue('nombreEncargado','CMTE. ANDRÉS ROBERTO RAMIREZ MENDOZA');
    $templateWord->setValue('cargoEncargado','DELEGADO REGIONAL DE PUERTO ESCONDIDO');
    break;

    case 'Matias Romero': 
    $templateWord->setValue('delegacion','Delegación de Matias Romero');
    $templateWord->setValue('nombreEncargado','CMTE. JOSE SALVADOR AQUINO ROJAS');
    $templateWord->setValue('cargoEncargado','DELEGADO REGIONAL DE MATIAS ROMERO');

    break;

    case 'Huajuapan':
    $templateWord->setValue('delegacion','Delegación de Huajuapan');
    $templateWord->setValue('nombreEncargado','CMTE. ALBERTO CONTRERAS GARCÍA');
    $templateWord->setValue('cargoEncargado','DELEGADO REGIONAL DE HUAJUAPAN');

    break;
  
  default:
    # code...
    break;
}
$templateWord->setValue('oficio',$permiso[0]->oficio);
$templateWord->setValue('fechaDescarga',$fD);
$templateWord->setValue('nombreElemento',$nombre);
$templateWord->setValue('num_anios',$anios);
$templateWord->setValue('num_meses',$meses);
$templateWord->setValue('num_dias',$dias);
$templateWord->setValue('fecha_inicial',$fI);
$templateWord->setValue('fecha_final',$fF);
$templateWord->setValue('fecha_reincorporacion',$fR);
$templateWord->setValue('nombreComandante',"LEONARDO ORTEGA MARTINEZ");
// --- Guardamos el documento
$templateWord->saveAs('oficioVacaciones.docx');
//$this->historial('Descarga de oficio de alta del elemento '.$id);
$nombreDocumento=$elemento[0]->apellido_paterno." ".$elemento[0]->apellido_materno." ".$elemento[0]->nombre;
$nombreDocumento=str_replace("  "," ",$nombreDocumento);
return Response::download('oficioVacaciones.docx',$nombreDocumento.'.docx');



    }




       
}
