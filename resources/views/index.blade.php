@extends('layout_pangea')

@section('title', 'Pangea')

@section('content')

    <div id="aboutUs" class="aboutUs" > <font size=5><h1><b>¿Quienes somos?</b></h1></font>
    <a><img src="{{url('images/logo_pangea.png')}}"  style="float:right;width:600px;height:450px;"><font size=6>PANGEA es una empresa que nace en Septiembre 2017 con el interés de demostrar que existen mil maneras de viajar. 
    Nuestro objetivo es exponerte las diferentes opciones que existen en el mundo para transportarnos, alojarnos y tomar un tour, convirtiendo a cada uno de nuestros viajes en una experiencia ÚNICA.</a>
    </font></div>
    <div id="workFlow" class="workFlow"> <font size=5><h1><b>¿Como trabajamos?</b></h1></font>
    <a><img src="{{url('images/logo_pangea.png')}}"  style="float:right;width:600px;height:450px;"><font size=6>Basados en una serie de preguntas que realizamos a los clientes, diseñamos una experiencia de viaje 100% personalizada. Le recordamos que:
    <pre>
• No somos una agencia de viajes, ya que no contamos con 
convenios que nos limiten en la reserva de servicios.
Todo lo adaptamos a tus necesidades.
• No manejamos paquetes ni somos mayoristas.
Trabajamos como diseñadores de viaje realizando la 
gestión y aseguramiento entre el cliente y el servicio 
contratado.
• Compartimos nuestra experiencia viajando con nuestros 
clientes, con la finalidad de convertir su viaje en algo 
increíble.</pre></a>
    </font> </div>
    <div id="service" class="service"> <font size=5><h1><b>Servicios:</b></h1></font>
    <a><img src="{{url('images/logo_pangea.png')}}"  style="float:right;width:600px;height:250px;">
    <font size=6><pre>
•Diseño de viajes. 
•Organizacion y gestión de viajes. 
•Elaboracion de itinerarios
•Compra y reserva de vuelos 
•Agenda y trámite de pasaporte mexicano 
•Agenda y trámite de visa estadounidense y otros países</pre></a>
    </font></div>


@endsection