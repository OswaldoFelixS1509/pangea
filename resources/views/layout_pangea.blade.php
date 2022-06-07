<!DOCTYPE html>
<!-- This template will only be used in contact and about is, etc -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Yield is a mark for content sections -->
        <title>@yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{{url('css/layout.css')}}">
    </head>

    <body>
        <header>
                <div class="header1" id="header1">
                    <div class="left" id="left"></div>
                    <div class="logo" id="logo"> <a href="{{ route('header.index')}}"> <img src="{{url('images/logo_pangea.png')}}"  width="123px" height="84px"> </a>  </div>
                    <!-- Add route to UserController.login. -->
                    <div class="login" id="login"> <p>Inicia sesión </p> </div>
                </div>
                <div class="header2" id="header2">
                    <!-- Replace  http://localhost:8000 url with the real url when it the server-->
                    @if(Request::url() == "http://localhost:8000")
                        <div> <a href="#aboutUs"> <p> ¿Quienes somos? </p> </a> </div>
                        <div> <a href="#service"> <p> Servicio </p> </a></div>
                        <div> <a href="{{ route('header.contact') }}"> <p> Contacto </p> </a></div>
                    @else
                        <div> <a href="{{ route('header.index')}}#aboutUs"> <p> ¿Quienes somos? </p> </a> </div>
                        <div> <a href="{{ route('header.index')}}#service"> <p> Servicio </p> </a></div>
                        <div> <a href="#content"> <p> Contacto </p> </a></div>
                    @endif
                </div>
                
                    <!-- Add second header -->
        </header>
        <!-- This section is where we will show the content -->
        <div class="content" id="content">
            @yield('content')
        </div>
        <!-- Footer information -->
        <footer>
                <div class="footerleft" id="footerleft">
                    texto 1
                </div>
                <div class="footerright" id="footerleft">
                    texto 2
                </div>
        </footer>
    </body>

</html>