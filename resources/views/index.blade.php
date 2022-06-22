@extends('layout_pangea')

@section('title', 'Pangea')

@section('content')

    <div id="aboutUs" class="aboutUs" > <img src="{{url('images/Mesa de trabajo 5.png')}}"  style="float:right;width:4in;height:4in;"><font size=5em><h1><b>¿Quienes somos?</b></h1></font>
    <a><font size=5em>PANGEA es una empresa que nace en Septiembre 2017 con el interés de demostrar que existen mil maneras de viajar. 
    Nuestro objetivo es exponerte las diferentes opciones que existen en el mundo para transportarnos, alojarnos y tomar un tour, convirtiendo a cada uno de nuestros viajes en una experiencia ÚNICA.</a>
    </font></div>
    <div id="workFlow" class="workFlow"> <img src="{{url('images/Pangea 4.png')}}"  style="float:right;width:4in;height:4in;"><font size=5em><h1><b>¿Como trabajamos?</b></h1></font>
    <a><font size=5em>Basados en una serie de preguntas que realizamos a los clientes, diseñamos una experiencia de viaje 100% personalizada. Le recordamos que:<br>
• No somos una agencia de viajes, ya que no contamos con convenios que nos limiten
en la reserva de servicios. Todo lo adaptamos a tus necesidades.<br>
• No manejamos paquetes ni somos mayoristas.<br>
Trabajamos como diseñadores de viaje realizando la gestión y aseguramiento entre 
el cliente y el servicio contratado.<br>
• Compartimos nuestra experiencia viajando con nuestros clientes, con la finalidad
de convertir su viaje en algo increíble.</a>
    </font></div>
    <div id="service" class="service"> <img src="{{url('images/Mesa de trabajo 5.png')}}"  style="float:right;width:4in;height:4in;"> <font size=5em><h1><b>Servicios:</b></h1></font>
    <a>
    <font size=5em>
•Diseño de viajes.<br>
•Organizacion y gestión de viajes.<br>
•Elaboracion de itinerarios.<br>
•Compra y reserva de vuelos .<br>
•Agenda y trámite de pasaporte mexicano.<br> 
•Agenda y trámite de visa estadounidense y otros países</a>
    </font></div>


@endsection