<!DOCTYPE html>
<!-- This template will only be used in contact and about is, etc -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="{{ asset('/js/header.js')}}"></script>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Yield is a mark for content sections -->
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{url('css/layout.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/layout.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/forms.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/aboutUs.css')}}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    </head>

    <body>
        <header>
        <div class="wrapper">
			<a href="{{ route('header.index')}}"><div class="logo"><img src="{{url('images/logo_pangea.png')}}"  width="123px" height="84px"></div> </a>
			
			<nav>
                @if(Request::url() == "http://localhost:8000")
				<a href="#aboutUs">¿Quienes somos?</a>
				<a href="#workFlow">Servicio</a>
				<a href="{{route('header.contact')}}">Contacto</a>
                @else
                <a href="{{ route('header.index')}}#aboutUs">¿Quienes somos?</a>
				<a href="{{ route('header.index')}}#service">Servicio</a>
				<a href="{{route('header.contact')}}">Contacto</a>
                @endif
                @if(Session::get('LoggedUser'))
                        @if(Session::get('Permission') == "user")
                        <a href="{{ route('user.index')}}">Mi perfil</a>
                        @else
                        <a href="{{ route('admin.index')}}">Mi perfil </a>
                        @endif
                    @else
                    <a href="{{ route('login.index')}}">Inicia sesión</a>
                    @endif
               
			</nav>
		</div>   
        </header>
        <!-- This section is where we will show the content -->
        <div class="content" id="content">
            @yield('content')
        </div>
        <!-- Footer information -->
        <footer>
                <div class="footerleft" id="footerleft">
                <a href="https://www.instagram.com/pangeatc/?igshid=YmMyMTA2M2Y="><img src="{{url('images/instagram.png')}}" style="float:left;width:.75in;height:.75in;padding-top: 10px; padding-left:10%;"></a>
                <a href="https://wa.me/message/HC2RWSUVKOPDD1"><img src="{{url('images/whatsapp.png')}}" style="float:right;width:.75in;height:.75in;padding-right:10%; padding-top: 10px"></a>
                </div>
                <div class="footerright" id="footerleft">
                <a href="mailto:felixsanchezoswaldo@gmail.com"><div id="imagencorreo" class="imagencorreo" ><img src="{{url('images/correo.png')}}" style="float:left;width:.75in;height:.75in; padding-top: 10px; padding-left:10%;"></a>
                    <a href="https://www.facebook.com/PangeaTravelConsulting/"><img src="{{url('images/facebook.png')}}" style="float:right;width:.75in;height:.75in;padding-right:10%; padding-top: 10px; "></a>
                </div>
        </footer>

        
    </body>

</html>