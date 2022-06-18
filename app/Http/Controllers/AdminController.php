<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        return view('admin.control');
    }

    function profile()
    {
        return view('admin.profile');
    }
}
