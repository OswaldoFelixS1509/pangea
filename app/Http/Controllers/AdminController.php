<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {

        $users = User::orderBy('name', 'asc')->paginate(15);
        return view('admin.control', 
        compact('users'));

      //->where('user_type', 'user') for selecting a type of uer
    }

    function profile()
    {
        return view('admin.profile');
    }

    function edit(User $user){
   
        return view('admin.editUser', compact('user'));
    }

    function checkUpdate(User $user, Request $request )
    {
        
        $request->validate([
            'nombre' => 'required',
            'usuario' => 'required',
            'email' => 'required|email',
            'userType' => 'required',
        ]);

        if( !empty(strip_tags($request->input('contraseña'))) )
        {
            User::where( 'id',$user->id)->update([
                'password' => Hash::make(strip_tags($request->input('contraseña')))
            ]);
        }
        $error = FALSE;

        if( strip_tags($request->input('usuario')) == $user->username && strip_tags($request->input('email')) == $user->email)
        {
                $this->update($user, $request);
                return back()->with('success', 'Datos guardados con exito');
        }
        else{
                $errormsg = "";
                $user2 = User::where('email', '=', strip_tags($request->input('email')))->get();
                
                if($user2->count() > 0 == TRUE)
                {     
                        if($user2->contains('email', $user->email) == FALSE)
                        {
                            return back()->with('fail', "Este correo ya esta en uso SAQUENME DE AQUI\r\n");  
                        }
                           
                }
                }
                $user3 = User::where('username', '=', strip_tags($request->input('usuario')))->get();
                if($user3->count() > 0 == TRUE)
                {
                    if($user3->contains('username', $user->username) == FALSE)
                    {
                        
                        return back()->with('fail', "Este nombre de usuario ya esta en uso SAQUENME DE AQUI");
                    }
                    
                }    
            
            
                $this->update($user, $request);
                return back()->with('success', 'Datos guardados con exito');
            
    }


    function update(User $user, Request $request )
    {
        $user->name = strip_tags($request->input('nombre'));
        $user->username = strip_tags($request->input('usuario'));
        $user->email = strip_tags($request->input('email'));
        $user->user_type = strip_tags($request->input('userType'));

        $user->save();
       
    }

}
