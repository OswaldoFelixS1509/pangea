<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" type="text/css" href="{{url('css/layoutuser.css')}}">
    <meta charset="utf-8">
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Yield is a mark for content sections -->
        <title>@yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{{url('css/layoutuser.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/documentoUser.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/content-styles.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/layout.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/forms.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/aboutUs.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/controlUsuarios.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/layout_admin.css')}}">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>

<body>
<header>
            <div class="wrapper">
			<a href="{{ route('header.index')}}"><div class="logo"><img src="{{url('images/logo_pangea.png')}}"  width="123px" height="84px"></div> </a>
            <nav>
            </nav>
			</div>
</header>
<div class="row">
            <aside>

            
            <ul>
            <div class="profilePicture">
                        @if(Session::get('ProfilePicture') == "user_picture.png")
                            <img src="{{asset('storage/images/users/'.Session::get('ProfilePicture'))}}">
                        @else
                            <img src="{{asset('storage/images/users/'.$user['id'].'/'.Session::get('ProfilePicture')) }}">
                        @endif
            </div>
                <li>
                    <div class="menuButton">
                    <a href="{{route('user.index')}}">Itinerario</a>
                    </div>
                </li>

                <li>
                    <a href="{{route('user.calendario')}}">Calendario</a>
                </li>
                <li>
                    <a href="{{route('user.pasesAbordar')}}">Pases de abordar</a>
                </li>
                <li>
                    <a href="{{route('user.infoCovid')}}">Info covid</a>
                </li>
                <li>
                    <a hrefD="{{route('user.profile')}}">Perfil</a>
                </li>
                <li>
                    <a class="cerrar" href="{{ route('login.logout')}}">Cerrar sesión </a>
                </li>
            </ul>
            </aside>
            <section>
            @yield('content')
            </section>
            <section2></section2>        
</div>

    
</body>

<footer>
                <div class="footerleft" id="footerleft">
                <img src="{{url('images/instagram.png')}}" style="float:left;width:.75in;height:.75in;padding-top: 10px; padding-left:10%;">
                <img src="{{url('images/whatsapp.png')}}" style="float:right;width:.75in;height:.75in;padding-right:10%; padding-top: 10px">
                </div>
                <div class="footerright" id="footerleft">
                <div id="imagencorreo" class="imagencorreo" ><img src="{{url('images/correo.png')}}" style="float:left;width:.75in;height:.75in; padding-top: 10px; padding-left:10%;">
                <img src="{{url('images/facebook.png')}}" style="float:right;width:.75in;height:.75in;padding-right:10%; padding-top: 10px; ">
                </div>
</footer>

</html>