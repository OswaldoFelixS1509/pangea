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
        <link rel="stylesheet" type="text/css" href="{{url('css/content-styles.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/documentoUser.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/layout.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/forms.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/aboutUs.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/controlUsuarios.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/layout_admin.css')}}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/translations/es.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Belleza&family=Cormorant:wght@500;600;700&display=swap" rel="stylesheet">

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
                            <img src="{{asset('storage/images/users/'.Session::get('Slug').'/'.Session::get('ProfilePicture')) }}">
                        @endif
            </div>
                <a href="{{route('user.index')}}">
                    <li>
                        <div class="menuButton">
                        Itinerario
                        </div>
                    </li>
                </a>
                <a href="{{route('user.calendario')}}">
                    <li>
                        Calendario
                    </li>
                </a>
                <a href="{{route('user.pasesAbordar')}}">
                    <li>
                        Pases de abordar
                    </li>
                </a>
                <li>
                    <a href="{{route('user.infoCovid')}}">Info covid</a>
                </li>
                <a href="{{route('user.tours')}}">
                    <li>
                        Tours y traslados
                    </li>
                </a>
                <a href="{{route('user.profile')}}">
                    <li>
                        Perfil
                    </li>
                </a>
                <a class="cerrar" href="{{ route('login.logout')}}">
                    <li>
                        Cerrar sesi??n 
                    </li>
                </a>
            </ul>
            </aside>
            <section>
                <div class="contenido">
                @yield('content')
                </div>
            </section>
            <section2></section2>        
</div>

    
</body>

</html>