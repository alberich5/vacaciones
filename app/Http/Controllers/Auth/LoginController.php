<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Acceso;
use App\User;

use Carbon\Carbon;
class LoginController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/menu';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


public function username()
{
    return 'username';
}



    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        
            if (Auth::attempt(['username' =>  $request['username'], 'password' => $request['password']])) {
         // Authentication passed...
       $usuario = User::find(Auth::user()->id);
       if($usuario->habilitado==true && $usuario->bloqueado==false && $usuario->id_acceso==0 )
        {
             
        //verificar sesion existente
            
        $acceso = new Acceso;
        $acceso->id_usuario=$usuario->id;
        $acceso->fecha_acceso=Carbon::now();
        $acceso->save();

       
        $usuario->id_acceso = $acceso->id;
        $usuario->save();
       
         return redirect()->intended('/menu');
        }
      

    }//if attemp



    }


/*
public function authenticated()
{
       
    if (Auth::attempt(['username' =>  $this->username(), 'password' => $password], $remember)) {
         // Authentication passed...

      
        $acceso = new Acceso;
        $acceso->id_usuario = Auth::user()->id;
        //$acceso->fecha_acceso = Carbon::now();
        $acceso->save();

        $usuario = User::find(Auth::user()->id);
        //$usuario->id_acceso = $acceso->id;
        //$usuario->save();
dd($usuario);
         return redirect()->intended('dashboard');
    }
}
//
*/
    public function validateLogin(Request $request)
    {
      // dd($request);
            
/*
$usuario = User::all();

$tam=count($usuario);
for ($i=0; $i <$tam ; $i++) { 
   $usuario[$i]->password=bcrypt('123456');
   $usuario[$i]->save();
}
        */
/*
$usuario = User::find(1);
        $usuario->password=bcrypt('123456');
        $usuario->save();
dd($usuario);
*/
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
          //'g-recaptcha-response'=>'required|string',
        ]);

        
    }







    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {

        $usuario = User::find(Auth::user()->id);
        

        $acceso = Acceso::find($usuario->id_acceso);
        $acceso->fecha_exit=Carbon::now();
        $acceso->save();

        $usuario->id_acceso = 0;
        $usuario->save();



       


        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }


}
