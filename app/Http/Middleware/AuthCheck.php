<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //If not logged you cannot enter to the page, only the ones specified can be entered without login
        if(!session()->has('LoggedUser') && ($request->path() !='/' && $request->path() !='/contacto' && $request->path() !='/login')){
            return redirect('/login')->with('fail', 'Primero debes de iniciar sesión');
            
        }
        //If logged you cannot enter login page
        if(session()->has('LoggedUser') && ($request->path() == '/login'))
        {
            return back();
        }

        $headers = [
            'Cache-Control'      => 'nocache, no-store, max-age=0, must-revalidate',
            'Pragma'     => 'no-cache',
            'Expires' => 'Sun, 02 Jan 1990 00:00:00 GMT'
        ];
        $response = $next($request);
        foreach($headers as $key => $value) {
            $response->headers->set($key, $value);
        }
 
        return $response;   
    }
}
