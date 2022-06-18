<!DOCTYPE html>
<!-- This template will only be used in contact and about is, etc -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Yield is a mark for content sections -->
        <title>@yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{{url('css/layout.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/forms.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/aboutUs.css')}}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    </head>

    <body>
        <header>
                <div class="header1" id="header1">
                    <div class="left" id="left"></div>
                    <div class="logo" id="logo"> <a href="{{ route('header.index')}}"> <img src="{{url('images/logo_pangea.png')}}"  width="123px" height="84px"> </a>  </div>
                    @if(Session::get('LoggedUser'))
                        @if(Session::get('Permission') == "user")
                        <div class="login" id="login"> <a href="{{ route('user.index')}}"> <p>Mi perfil </p>  </a></div>
                        @else
                        <div class="login" id="login"> <a href="{{ route('admin.index')}}"> <p>Mi perfil </p>  </a></div>
                        @endif
                    @else
                    <div class="login" id="login"> <a href="{{ route('login.index')}}"> <p>Inicia sesión </p>  </a></div>
                    @endif
                    
                </div>
                @if(Request::url() == "http://localhost:8000" || Request::url() == "http://localhost:8000/contacto")
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
                @else
                    
                @endif
                   
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