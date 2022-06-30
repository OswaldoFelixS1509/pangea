<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Muestra el formulario de registro de usuarios
        return view('admin/register');
    }

    public function show($id)
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        //Valida y guarda un nuevo usuario en la BD

        $request->validate([
            'nombre' => 'required',
            'usuario' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'userType' => 'required',
            'contraseña' => 'required',
            'confirmacion_contraseña' => 'required|same:contraseña'
        ]);
        $usuario = new User();

        $usuario->name = strip_tags($request->input('nombre'));
        $usuario->username = strip_tags($request->input('usuario'));
        $usuario->slug = Str::slug(strip_tags($request->input('usuario')), '-');
        $usuario->email = strip_tags($request->input('email'));
        $usuario->password = strip_tags($request->input('contraseña'));
        $usuario->user_type = strip_tags($request->input('userType'));

        $usuario->save();        
        return back()->with('success', 'Usuario registrado con exito'); 
       

    }
    
}
