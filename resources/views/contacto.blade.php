@extends('layout_pangea')

@section('title', 'Contacto')

@section('content')


    <div class="contactForm" id="contactForm">
        <p>Por favor llena este formulario para ponernos en contacto contigo</p>
        <div class="txtCorreo" id="txtCorreo">
            @if(Session::get('success'))
            <div class="alert">
                <br>
                {{Session::get('success')}}
            </div>

            <br>
            @endif
            <form method="POST" action="{{ route('header.contact')}}">
                @csrf
                <label class="text-email" for="email">Correo* </label><br>
                <div class="formData" id="formEmail">   
                    <i class="material-icons md-48">email</i>
                    <input class="txtInput" type="email" value="{{ old('email')}}" id="email" name="email" placeholder="example@mail.com">
                </div>
                @error('email')
                        <div class="form-error"> 
                            {{$message}}
                        </div>
                        <br>
                @enderror
                
                <label class="text-phone" for="telefono">Número telefonico* </label><br>
                <div class="formData" id="formPhone">   
                    <i class="material-icons md-48">call</i>
                    <input class="txtInput" type="tel" id="telefono" value="{{ old('telefono')}}" name="telefono" placeholder="111 1111 1111" maxlength="12">
                </div>
                @error('telefono')
                        <div class="form-error"> 
                            {{$message}}
                        </div>
                        <br>
                @enderror
                <label class="text-name" for="nombre">Nombre completo* </label><br>
                <div class="formData" id="formName">   
                    <i class="material-icons md-48">person</i>
                    <input class="txtInput" type="text" id="nombre" value="{{old('nombre')}}" name="nombre">
                </div>
                @error('nombre')
                        <div class="form-error"> 
                            {{$message}}
                        </div>
                        <br>
                @enderror
                <label class="text-message" for="mensaje">Mensaje </label><br>
                <div class="formData" id="formMessage">   
                    <i class="material-icons md-48">chat</i>
                    <textarea class="txtInputArea" type="text" id="mensaje" value="{{old('mensaje')}}" name="mensaje" rows="15"></textarea>
                </div>
                <br>
                <div class="buttonHolder">
                    <button class="btnSubmit">Enviar mensaje</button>
                </div>

            </form>

        </div>
    
    </div>

@endsection


