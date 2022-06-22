<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Documento;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;

class DocumentController extends Controller
{
    function documents(User $user){
        //Hace una consulta para mostrar todos los archivos del usuario seleccionado
        $documentos = Post::where('user_id', $user->id)->orderBy('category', 'asc')->paginate(10);
        return view('admin.documentos', compact('user'), compact('documentos'));
        
    }

    function create(User $user){
        //Muestra el formulario para subir un nuevo documento
        return view('admin.nuevo-documento', compact('user'));
    }

    function store(User $user, Request $request){

        $request->validate([
            'titulo' => 'required',
            'categoria' => 'required',
            'archivos' => 'required',
            
        ]);

        if(!$request->hasFile('archivos'))
        {
            return back()->with('fail', 'No has agregado ningún archivo');
        }


        $post = new Post();

        $post->user_id = $user->id;
        $post->admin_id = session()->get('LoggedUser');
        $post->title = strip_tags($request->input('titulo'));
        $post->slug = Str::slug(strip_tags($request->input('titulo')));
        $post->category = strip_tags($request->input('categoria'));
        $post->comment = strip_tags($_POST[ 'comment' ]);

        $post->save();



        $maxSize = (int)ini_get('upload_max_filesize') * 10240;

        $files = $request->file('archivos');

        $fileSaver = new Documento(); 
        foreach($files as $file){
            $filename = Str::slug($file->getClientOriginalName(), '-') . '.' . $file->getClientOriginalExtension();



            if(Storage::putFileAs('/public/files/users/'.$user->slug.'/'. $post->id .'/', $file, $filename))
            {
                $fileSaver->post_id = $post->id;
                $fileSaver->filename = $filename;
                $fileSaver->type = $file->getClientOriginalExtension();
                
                $fileSaver->save();
            }
            

        }

        return back()->with('success', 'Archivo guardado exitosamente!');
    }

    function destroy(Request $request, User $user, $documento){
        //documento == post_id
        $documentos = Documento::where('post_id', $documento)->get();

        //Elimina los archivos de la carpeta
        foreach($documentos as $file){
            unlink(public_path('storage/files/users/'. $user->slug. '/' . $file->post_id .'/' .  $file->fileName));
            File::deleteDirectory(public_path('storage/files/users/'. $user->slug. '/' . $file->post_id ));
        }

        Post::where('id', $documento)->delete();
        
        return back()->with('success', 'Documento eliminado con exito!');
       
    }

}
