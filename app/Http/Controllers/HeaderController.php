<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function index()
    {   
        //Change layout_pangea for index file 
        //
        return view('index');
    }
    public function contact()
    {
        return view('contacto');
    }
}
