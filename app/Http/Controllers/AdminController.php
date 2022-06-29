<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Documento;
use App\Models\Post;
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
        $user = User::where('id', session()->get('LoggedUser'))->first();
        return view('admin.profile', compact('user'));
    }

    
    function edit(User $user){
   

        return view('admin.editUser', compact('user'));
    }

    function editProfile()
    {
        $user = User::where('id', session()->get('LoggedUser'))->first();
        return view('admin.editProfile', compact('user'));
    }

    
    

}
