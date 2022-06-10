<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        //$credentials = $request->getCredentials();

        $request->validate([
            'usuario' => 'required',
            'contraseña' => 'required'

        ]);
        $credentials = request()->only('email', 'password');

        $credentials = request()->only('email', 'contraseña');

        if(Auth::attemp($credentials))
        {
            return 'Sesión iniciada';   
        }
        return 'login fallido';

        // if(!Auth::validate($credentials))
        // {
        //     return redirect()->to('/login')->withErrors('auth.failed');
        // }
        // $user = Auth::getProvider()->retrieveByCredentials($credentials);
        // Auth::login($user);
        // return $this->authenticated($request, $user);


    }

    public function authenticated($request, $user){
        return redirect()->route('header.index')->with('alert', 'Inicio de sesión exitoso');
    }


}
