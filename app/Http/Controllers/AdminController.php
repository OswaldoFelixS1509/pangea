<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Documento;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;

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

    function destroyUser(User $user){
        $post = Post::where('user_id', $user->id)->get();
        if(count($post) > 0)
        {
            Storage::deleteDirectory('files/users/'. $user->slug);
            Post::where('user_id', $user->id)->delete();
        }
        if($user->profile_picture != 'user_picture.png')
        {
            Storage::deleteDirectory('images/users/'. $user->slug);
        }
        User::where('id', $user->id)->delete();
        return back();
    }
    

}
