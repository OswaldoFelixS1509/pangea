<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Documento;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response as FacadeResponse;

class DocumentController extends Controller
{
    function documents(User $user){
        //Hace una consulta para mostrar todos los archivos del usuario seleccionado
        $documentos = Post::where('user_id', $user->id)->orderBy('category', 'asc')->paginate(10);
        $autor = [];
        foreach($documentos as $documento)
        {
            $autor[] = User::where('id', $documento->admin_id)->value('name');
        }
        if($autor > 0)
        {
            return view('admin.documentos', compact(['user', 'documentos', 'autor']));
        }
        else{
            return view('admin.documentos', compact(['user', 'documentos']));
        }
        
        
    }

    function create(User $user){
        //Muestra el formulario para subir un nuevo documento
        return view('admin.nuevo-documento', compact('user'));
    }

    function createImage(User $user)
    {
        return view('user.subir-fotos', compact('user'));
    }


    function store(User $user, Request $request){
        //Guarda un nuevo post y todos sus documentos 
        $request->validate([
            'titulo' => 'required',
            'categoria' => 'required',
            'archivos' => 'required',
            
        ]);

        $post = new Post();

        $post->user_id = $user->id;
        $post->admin_id = session()->get('LoggedUser');
        $post->title = strip_tags($request->input('titulo'));
        $post->slug = Str::slug(strip_tags($request->input('titulo')));
        $post->category = strip_tags($request->input('categoria'));
        $post->comment = strip_tags($_POST[ 'comment' ]);
        $post->save();
        $files = $request->file('archivos');

        // $path = public_path('/storage/files/users/'.$user->slug.'/'. $post->id );

        // if(!File::isDirectory($path)){
        // File::makeDirectory($path, 0777, true, true);
        // }

        foreach($files as $file){
            
            $filename = Str::slug($file->getClientOriginalName(), '-') . '.' . $file->getClientOriginalExtension();
            if(Storage::putFileAs('/public/files/users/'.$user->slug.'/'. $post->id .'/', $file, $filename))
            {
                Documento::create([
                    'post_id' => $post->id, 
                    'filename' => $filename,
                    'type' => $file->getClientOriginalExtension()
                ]);
            }
        }
        return back()->with('success', 'Archivos guardado exitosamente!');
    }

    function destroy(Request $request, User $user, $documento){
        //Elimina el post y todos los archivos que le corresponde
        $documentos = Documento::where('post_id', $documento)->get();
        foreach($documentos as $file){
            unlink(public_path('storage/public/files/users/'. $user->slug. '/' . $file->post_id .'/' .  $file->fileName));
            File::deleteDirectory(public_path('storage/public/files/users/'. $user->slug. '/' . $file->post_id ));
        }

        Post::where('id', $documento)->delete();
        
        return back()->with('success', 'Archivos eliminados con exito!');
       
    }

    function download(Request $request){
        $file = Documento::where('id', $request->id)->first();
        
        $archivo = public_path().'/storage/files/users/'. session()->get('Slug') . '/' . $file->post_id . '/' . $file->fileName;
        
        $headers = ['Content-Type: image/jpg'];
        $fileName = time().'.'.$file->type;
        
        return response()->download($archivo, $fileName, $headers);
        if (file_exists($archivo)) {
            
        } else {
            echo('Archivo no encontrado.');
        }
        
        
    }



}
