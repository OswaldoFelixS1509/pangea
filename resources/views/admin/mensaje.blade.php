@extends('admin/layout_admin')


@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Belleza&family=Cormorant:wght@500;600;700&display=swap" rel="stylesheet">
<div class="contenedorMensaje">
    <div class="contieneDatos">
        <label class="title">Mensaje de {{$mensaje->nombre}}</label>
        <br>
        <div>
            <label> Información de contacto: </label> <br> <br>
            <p>Nombre completo: {{$mensaje->nombre}}</p>
            <p>Número de telefono: {{$mensaje->telefono}}</p>
            <p>Correo electronico: {{$mensaje->correo}}</p>
            <br>
            <a href="{{ route('admin.unseen', $mensaje)}}"><input class="buttonRead" type="button" value="Marcar como no leido"></a>
        </div>
        <br>


    </div>
    <div class="contieneMensaje">
        <label>Mensaje</label> <br>
        <pre> {{$mensaje->mensaje}} </pre> 
    </div>
</div>







@endsection