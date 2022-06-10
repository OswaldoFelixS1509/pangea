@extends('layout_pangea')

@section('title', 'Inicio de sesión')

@section('content')
<div class="backbutton">
    <a href="{{url()->previous()}}"> 
    <button class="btnBack">Regresar </button>
    </a>
</div>

<div class="loginForm">
    <p>Inicio de sesión </p>
    <div class="txtCorreo" id="txtCorreo">
        <form method="POST" action="{{route('login.login')}}">
            @csrf
            <label class="text-user" for="usuario"> Usuario* </label> <br>
            <div class="formData" id="usuario">
                    <i class="material-icons md-48">person</i>
                    <input class="txtInput" type="text" id="usuario" name="usuario">
            </div>
            @error('usuario')
                        <div class="form-error"> 
                            {{$message}}
                        </div>
                        <br>
                @enderror
            <label class="text-password" for="password"> Contraseña* </label> <br>
            <div class="formData" id="usuario">
                    <i class="material-icons md-48">lock</i>
                    <input class="txtInput" type="password" id="contraseña" name="contraseña">
            </div>
            @error('contraseña')
                        <div class="form-error"> 
                            {{$message}}
                        </div>
                        <br>
                @enderror
            <div class="buttonHolder">
                    <button class="btnSubmit">Iniciar sesión</button>
                </div>
        </form>
    </div>
</div>

@endsection

@if(session()->has('alert'))
    <script>
        alert("  {{ session()->get('alert') }} ")
    </script>
@endif
