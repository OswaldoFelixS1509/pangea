<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function index()
    {   
        //Muestra el index de la página 
        //
        return view('index');
    }
    public function contact()
    {
        //Muestra el formulario de contacto
        return view('contacto');
    }
}
