@extends('admin/layout_admin')

@section('title', 'Cambiar datos de perfil')

@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Belleza&family=Cormorant:wght@500;600;700&display=swap" rel="stylesheet">

<form action="{{route('admin.checkUpdate', $user)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
   
    <p class="title">Editar información de usuario</p>
    @if(Session::get('success'))
    <div class="alert">
      {{Session::get('success')}}
    </div>
    <br>
    @endif
    @if(Session::get('fail'))
    <div class="failalert">
      {{Session::get('fail')}}
    </div>
    <br>
    @endif
    <label>Nombre completo </label> <br>
    <input class="txtInput" type="text" name="nombre" value="{{$user['name']}}"> <br>
    @error('nombre')
        <div class="form-error"> 
            {{$message}}
        </div>
      <br>
    @enderror
    <label>Nombre de usuario </label> <br>
    <input class="txtInput" type="text" value="{{$user['username']}}" name="usuario"><br>
    @error('usuario')
        <div class="form-error"> 
            {{$message}}
        </div>
      <br>
    @enderror
    <label for="Subir archivo">Foto de perfil</label> <br>
    <input type="file" value="{{ old('archivos')}}" name="archivos" id="archivos  ">
    <br>
    @error('archivos')
        <div class="form-error"> 
            {{$message}}
        </div>
      <br>
    @enderror
    <label>Email </label> <br>
    <input class="txtInput" type="email" value="{{$user['email']}}" name="email"> <br>
    @error('email')
        <div class="form-error"> 
            {{$message}}
        </div>
      <br>
    @enderror
    <label> Contraseña</label> <br>
    <input class="txtInput" type="password" value="{{old('contraseña')}}" name="contraseña"> <br>
    @error('contraseña')
        <div class="form-error"> 
            {{$message}}
        </div>
      <br>
    @enderror
    <select name="userType" style="display: none;">
        @if($user['user_type'] == 'user')
            <option value="user" selected>Usuario</option>
            <option value="admin">Administrador</option>
        @else
            <option value="user" >Usuario</option>
            <option value="admin" selected>Administrador</option>
        @endif
    </select>
    <button class="btnSubmit">Actualizar datos </button>
</form>


@endsection