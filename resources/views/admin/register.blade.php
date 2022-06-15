@extends('layout_pangea')

@section('content')
@if(Session::get('success'))
    <div class="alert">
      {{Session::get('success')}}
    </div>
    <br>
    @endif

<form action="{{route('register.index')}}" method="POST">
    @csrf
   
    
    <label>nombre </label> <br>
    <input type="text" name="nombre" value="{{old('nombre')}}"> <br>
    @error('nombre')
        <div class="form-error"> 
            {{$message}}
        </div>
      <br>
    @enderror
    <label>Username </label> <br>
    <input type="text" value="{{old('usuario')}}" name="usuario"><br>
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
    <label>email </label> <br>
    <input type="email" value="{{old('email')}}" name="email"> <br>
    @error('email')
        <div class="form-error"> 
            {{$message}}
        </div>
      <br>
    @enderror
    <label> pass</label> <br>
    <input type="password" name="contraseña"> <br>
    @error('contraseña')
        <div class="form-error"> 
            {{$message}}
        </div>
      <br>
    @enderror
    <label> confirm pass</label> <br>
    <input type="password" name="confirmacion_contraseña"> <br>
    @error('confirmacion_contraseña')
        <div class="form-error"> 
            {{$message}}
        </div>
      <br>
    @enderror
    <button>Registrar </button>
</form>

@endsection