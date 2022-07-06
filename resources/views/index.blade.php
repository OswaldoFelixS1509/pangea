@extends('layout_pangea')

@section('title', 'Pangea')

@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Belleza&family=Cormorant:wght@500;600;700&family=Zen+Maru+Gothic:wght@300&display=swap" rel="stylesheet">
<div id="imagen" class="imagen" ><img src="{{asset('images/pangea_collage5.jpg')}}"  style="float:down;width:1481px;height:500px;padding-top:5px;padding-bottom:2.5px"></div>
<div id="imagen1" class="imagen1" ><img src="{{asset('images/pangea_collage4.jpg')}}"  style="float:down;width:100%;height:100%;padding-top:5px;padding-bottom:2.5px"></div>
<div id="imagen1" class="imagen1" ><img src="{{asset('images/pangea_collage3.jpg')}}"  style="float:down;width:100%;height:100%;padding-top:5px;padding-bottom:2.5px"></div>
    <div id="aboutUs" class="aboutUs" ><div id="imagen" class="imagen" ><img src="{{url('images/avion.png')}}" style="float:right;width:4in;height:4in;"></div><font size=5em><h1><b>¿Quiénes somos?</b></h1></font>
    <a> <font size=5em>PANGEA es una empresa que nace en Septiembre 2017 con el interés de demostrar que existen mil maneras de viajar. 
Nuestro objetivo es exponerte las diferentes opciones que existen en el mundo para llegar de un punto a otro, alojarnos y conocer el mundo a través de guías turísticos, convirtiendo cada uno de nuestros viajes en una experiencia ÚNICA. 
</font></a>
    <div id="imagen1" class="imagen1" ><img src="{{url('images/avion.png')}}" style="float:down;width:4in;height:4in;"></div></div>
    <div id="workFlow" class="workFlow"> <div id="imagen4" class="imagen4" > <img src="{{url('images/mensaje.png')}}"  style="float:right;width:4in;height:4in;"></div><font size=5em><h1><b>¿Cómo trabajamos?</b></h1></font>
    <a><font size=5em>Basados en una serie de preguntas que realizamos a los clientes, diseñamos una experiencia de viaje 100% personalizada. <br>
    •NO somos una agencia de viajes, ya que no contamos con convenios que nos limiten en la reserva de servicios. Todo lo adaptamos a tus necesidades. <br>
    •NO manejamos paquetes ni somos mayoristas. Trabajamos como diseñadores de viaje realizando la gestión y aseguramiento entre el cliente y el servicio contratado.<br>
    •Compartimos nuestra experiencia viajando con nuestros clientes, con el objetivo de facilitar tu experiencia de viaje. 
<br>
    </font><div id="imagen2" class="imagen2" > <img src="{{url('images/mensaje.png')}}"  style="float:down;width:4in;height:4in;"></div></div>
    <div id="service" class="service"><div id="imagen5" class="imagen5" > <img src="{{url('images/maleta.png')}}"  style="float:right;width:4in;height:4in;"></div> <font size=5em><h1><b>Servicios:</b></h1></font>
    <a>
    <font size=5em>
•Diseño de viajes.<br>
•Organización y gestión de viajes.<br>
•Elaboración de itinerarios.<br>
•Compra y reserva de vuelos.<br>
•Agenda y trámite de pasaporte mexicano.<br> 
•Agenda y trámite de visa estadounidense y otros países.</a></font><div id="imagen3" class="imagen3" > <img src="{{url('images/maleta.png')}}"  style="float:down;width:4in;height:4in;"></div></div>
    



@endsection