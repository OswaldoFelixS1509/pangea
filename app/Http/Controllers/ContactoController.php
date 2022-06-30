<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Muestra la lista de mensajes enviados por los usuarios
        $mensajes = Contacto::orderBy('leido', 'asc')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.contacto', compact('mensajes'));
    }

 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Valida que se cumplas los campos, posteriormente guarda en la BD
        $request->validate([
            'email' => 'required|email',
            'telefono' => 'required',
            'nombre' => 'required'
        ]);
        $contacto = new Contacto();
        $contacto->correo = strip_tags($request->input('email'));
        $contacto->telefono = strip_tags($request->input('telefono'));
        $contacto->nombre = strip_tags($request->input('nombre'));
        $contacto->mensaje =  strip_tags($request->input('mensaje'));
        $contacto->leido = false;

        $contacto->save();

        return redirect()->route('header.contact')->with('success', 'Datos enviados con exito. Te contactaremos pronto!');
    }

 
    public function show(Contacto $mensaje)
    {
        
        //Muestra un mensaje en la BD y actualiza el estado del mensaje a leido
        $mensaje->correo = $mensaje->correo;
        $mensaje->telefono = $mensaje->telefono;
        $mensaje->nombre = $mensaje->nombre;
        $mensaje->mensaje = $mensaje->mensaje;
        $mensaje->leido = 1;
        $mensaje->save();
        
        return view('admin.mensaje', compact('mensaje'));
    }

  
    public function unseen(Contacto $mensaje)
    {
        //Actualiza el estado del mensaje a no leido
        $mensaje->correo = $mensaje->correo;
        $mensaje->telefono = $mensaje->telefono;
        $mensaje->nombre = $mensaje->nombre;
        $mensaje->mensaje = $mensaje->mensaje;
        $mensaje->leido = 0;
        $mensaje->save();
        return redirect()->route('admin.contact');
    }

  
    public function destroy($id)
    {
        //Elimina el mensaje
        Contacto::where('id', $id)->delete();
        return back()->with('success', 'Documento eliminado con exito!');
    }
}
