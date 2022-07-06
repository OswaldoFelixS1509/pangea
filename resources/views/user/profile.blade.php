@extends('user/layout_user')

@section('title', 'Perfil')

@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Belleza&family=Cormorant:wght@500;600;700&display=swap" rel="stylesheet">

<div class="contieneDatos">
<h1 style="font-size:2em; ">Mi perfil</h1><br>
        <label><i class="material-icons md-48 profile">account_box</i>Nombre de usuario:</label>
        <label> {{$user['username']}}</label>
    
     
        <label><i class="material-icons md-48 profile">person</i>Nombre completo:</label>
        <label>{{$user['name']}}</label>
    
    
    <label><i class="material-icons md-48 profile">mail</i>Correo electronico:</label>
    <label>{{$user['email']}}</label>
    <div class="contienePerfil">
    <a href="{{ route('admin.editProfile')}}"> <button type="button" class="btn btn-warning">Actualizar datos</button> </a>
    </div>
    <br>
    <label><i class="material-icons md-48 profile">photo_camera</i>Mis fotos:</label>
    <div class="contieneFotos">
       
            @foreach($documentos as $documento)
                @foreach($imagenes[$loop->index] as $imagen)
                    <img src="{{ asset('storage/files/users/' . Session::get('Slug') . '/'. $documento['id'] . '/' .$imagen['fileName'])}}" class="profileImage" alt="">
                    <br>
                @endforeach
            
            @endforeach
        
    </div>
</div>
<br>

@endsection