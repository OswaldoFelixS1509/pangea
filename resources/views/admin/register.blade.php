@extends('admin/layout_admin')

@section('content')


<form action="{{route('register.index')}}" method="POST">
    @csrf
    <p class="title">Registrar nuevo usuario</p>
    <br>
    @if(Session::get('success'))
    <div class="alert">
      {{Session::get('success')}}
    </div>
    <br>
    @endif
    
    <label>Nombre completo</label> <br>
    <input class="txtInput" type="text" name="nombre" value="{{old('nombre')}}"> <br>
    @error('nombre')
        <div class="form-error"> 
            {{$message}}
        </div>
      <br>
    @enderror
    <label>Nombre de usuario </label> <br>
    <input class="txtInput" type="text" value="{{old('usuario')}}" name="usuario"><br>
    @error('usuario')
        <div class="form-error"> 
            {{$message}}
        </div>
      <br>
    @enderror

    <label> Tipo de usuario</label> <br>
    <select name="userType">
      <option value="user" selected>Usuario</option>
      <option value="admin">Administrador</option>
    </select>
    <br>
    <label>Email </label> <br>
    <input class="txtInput" type="email" value="{{old('email')}}" name="email"> <br>
    @error('email')
        <div class="form-error"> 
            {{$message}}
        </div>
      <br>
    @enderror
    <label> Contraseña</label> <br>
    <input class="txtInput" type="password" name="contraseña"> <br>
    @error('contraseña')
        <div class="form-error"> 
            {{$message}}
        </div>
      <br>
    @enderror
    <label> Confirmación de contraseña</label> <br>
    <input class="txtInput" type="password" name="confirmacion_contraseña"> <br>
    @error('confirmacion_contraseña')
        <div class="form-error"> 
            {{$message}}
        </div>
      <br>
    @enderror
    <button class="btnSubmit">Registrar </button>
</form>

@endsection