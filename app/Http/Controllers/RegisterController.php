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
        return view('admin/register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        //register(RegisterRequest $request) for mass assigment
        //$user = User::create($request->validated());

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
        //redirect()->route('register.index')

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
