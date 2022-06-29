<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function logout()
    {
        if(session()->has('LoggedUser'))
        {
            // session()->pull('LoggedUser');
            // session()->pull('Permission');
            // session()->pull('ProfilePicture');
            // session()->pull('Slug');
            session()->flush();
            return redirect()->route('login.index');
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'usuario' => 'required',
            'contraseña' => 'required'

        ]);
        //Revisa si el usuario esta correcto
        $userInfo = User::where('username', '=',strip_tags($request->usuario) )->first();
        
        if(!$userInfo)
        {
            return back()->with('fail', 'Usuario incorrecto');
        }
        else{
            //Revisar contraseña
            if(Hash::check(strip_tags($request->contraseña), $userInfo->password))
            {
                $request->session()->put('LoggedUser', $userInfo->id);
                $request->session()->put('Permission', $userInfo->user_type);
                $request->session()->put('Slug', $userInfo->slug);
                $request->session()->put('ProfilePicture', $userInfo->profile_picture);
                
               
                if($userInfo->user_type == "admin")
                {
                    return redirect()->route('admin.index');
                }
                else{
                    return redirect()->route('user.index');
                }
                
            }
            else{
                return back()->with('fail', 'Contraseña incorrecta');
            }
        }
        


    }


   

}
