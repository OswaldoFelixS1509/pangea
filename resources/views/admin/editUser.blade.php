@extends('admin/layout_admin')

@section('title' ,'Editar usuario')

@section('content')


<form action="{{route('admin.checkUpdate', $user)}}" method="POST">
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

    <label> Tipo de usuario</label> <br>
    <select name="userType">
        @if($user['user_type'] == 'user')
            <option value="user" selected>Usuario</option>
            <option value="admin">Administrador</option>
        @else
            <option value="user" >Usuario</option>
            <option value="admin" selected>Administrador</option>
        @endif
    </select>
    <br>
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
    <button class="btnSubmit">Actualizar datos </button>
</form>

@endsection