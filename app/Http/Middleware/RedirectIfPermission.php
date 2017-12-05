<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Contracts\Auth\Guard;

class RedirectIfPermission
{


    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        dd($request);
        if ($this->auth->user()->id_acceso==0) 
        {
            $this->auth->logout();
            return redirect('/');
        }
        else
        {
            return $next($request);
        }
        //
        
    }
}
