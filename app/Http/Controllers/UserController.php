<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Documento;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /*
        amogus ඞ
        ඞ ඞ
        ඣ
        ඝ ඞ
    */
    function index(Request $request)
    {


        $posts = Post::where([
            'user_id' => session()->get('LoggedUser'),
            'category' => 'Itinerario'
            ])->get();
        $autor = [];
        $categoria = "Itinerario";
        foreach($posts as $post)
        {
            
            $autor[] = User::where('id', $post->admin_id)->value('name');
        }
        
        if($autor > 0)
        {
            return view('user.itinerario', compact(['posts', 'autor', 'categoria']));
        }
        else
        {
            return view('user.itinerario', compact(['posts']));
        }
        
        
    }

    function calendario(){
        $posts = Post::where([
            'user_id' => session()->get('LoggedUser'),
            'category' => 'calendario'
            ])->get();
        $autor = [];
        $categoria = "Calendario";
        foreach($posts as $post)
        {
            $autor[] = User::where('id', $post->admin_id)->value('name');
        }
        if($autor > 0)
        {
            return view('user.itinerario', compact(['posts', 'autor', 'categoria']));
        }
        else
        {
            return view('user.itinerario', compact(['posts']));
        }
    }

    function pasesAbordar(){
        $posts = Post::where([
            'user_id' => session()->get('LoggedUser'),
            'category' => 'PasesAbordar'
            ])->get();
        $autor = [];
        $categoria = "Pases de abordaje";
        foreach($posts as $post)
        {
            $autor[] = User::where('id', $post->admin_id)->value('name');
        }
        if($autor > 0)
        {
            return view('user.itinerario', compact(['posts', 'autor', 'categoria']));
        }
        else
        {
            return view('user.itinerario', compact(['posts']));
        }
    }

    function infoCovid(){
        $posts = Post::where([
            'user_id' => session()->get('LoggedUser'),
            'category' => 'InfoCovid'
            ])->get();
        $autor = [];
        $categoria = "Información Covid";
        foreach($posts as $post)
        {
            $autor[] = User::where('id', $post->admin_id)->value('name');
        }
        if($autor > 0)
        {
            return view('user.itinerario', compact(['posts', 'autor', 'categoria']));
        }
        else
        {
            return view('user.itinerario', compact(['posts']));
        }
    }

    function showDocument($request){

        $post = Post::where([
            'id' => $request,
            'user_id' => session()->get('LoggedUser'), 
        ])->first();

        switch($post->category){
            case 'Itinerario':
                {
                    $categoria = "Itinerario";
                    break;
                }
            case 'Calendario':
                {
                    $categoria = 'Calendario';
                    break;
                }
            case 'PasesAbordar':
                {
                    $categoria = 'Pases de abordar';
                    break;
                }
            case 'InfoCovid':
                {
                    $categoria = 'Información covid';
                    break;
                }
            default:
            {
                $categoria = "Documento";
                break;
            }

        }

        $categoria = $post->category;
        $autor = User::where('id', $post->admin_id)->first();
        $archivos = Documento::where('post_id', $request)->get();
        
       

        return view('user.documento', compact(['archivos', 'post', 'autor', 'categoria']));
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
                            return back()->with('fail', "Este correo ya esta en uso\r\n");  
                        }
                           
                }
                }
                $user3 = User::where('username', '=', strip_tags($request->input('usuario')))->get();
                if($user3->count() > 0 == TRUE)
                {
                    if($user3->contains('username', $user->username) == FALSE)
                    {
                        
                        return back()->with('fail', "Este nombre de usuario ya esta en uso");
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
