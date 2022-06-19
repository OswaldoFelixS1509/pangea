<?php

namespace App\Http\Controllers;

use App\Models\User;
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

}
