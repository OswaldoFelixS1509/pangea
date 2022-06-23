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
        $mensajes = Contacto::orderBy('leido', 'asc')->paginate(15);
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
        $request->validate([
            'email' => 'required|email',
            'telefono' => 'required',
            'nombre' => 'required'
        ]);
        $contacto = new Contacto();
        $contacto->correo = strip_tags($request->input('email'));
        $contacto->telefono = strip_tags($request->input('telefono'));
        $contacto->nombre = strip_tags($request->input('nombre'));
        $contacto->mensaje = strip_tags($request->input('mensaje'));
        $contacto->leido = false;

        $contacto->save();

        return redirect()->route('header.contact')->with('success', 'Datos enviados con exito. Te contactaremos pronto!');
    }

 
    public function show(Contacto $mensaje)
    {
        

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
        Contacto::where('id', $id)->delete();
        return back()->with('success', 'Documento eliminado con exito!');
    }
}
