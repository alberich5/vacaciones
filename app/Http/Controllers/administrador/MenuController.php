<?php

namespace App\Http\Controllers\administrador;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MenuController extends Controller
{
 
	    /**
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
        $verificacion=$this->verificarPermiso(1);
        if($verificacion==false)
        {
        return redirect('/menu');    
        }
        */

        
        return view('administrador.index'); 
        
         
    }

}
