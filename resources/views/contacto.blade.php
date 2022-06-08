@extends('layout_pangea')

@section('title', 'Contacto')

@section('content')

    <div class="contactForm" id="contactForm">
        <p>Por favor llena este formulario para ponernos en contacto contigo</p>
        <div class="txtCorreo" id="txtCorreo">
            <form>
                <div class="formEmail" id="formEmail">
                    <label class="text-email" >Correo* </label> <br>
                    <i class="material-icons">mail </i>
                    <input class="txtInput" type="text" id="email" name="email">
                </div>
            </form>

        </div>
    
    </div>

@endsection