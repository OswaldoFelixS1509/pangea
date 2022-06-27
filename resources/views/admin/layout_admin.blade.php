<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   
    <meta charset="utf-8">
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ asset('/js/header.js')}}"></script>
    
        <!-- Yield is a mark for content sections -->
        <title>@yield('title')</title>
        
        <link rel="stylesheet" type="text/css" href="{{url('css/layoutuser.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/content-styles.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/layout.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/forms.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/aboutUs.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/controlUsuarios.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/layout_admin.css')}}">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/translations/es.js"></script>

</head>

<body>
<header>
        <div class="wrapper">
        <a href="{{ route('header.index')}}"><div class="logo"><img src="{{url('images/logo_pangea.png')}}"  width="123px" height="84px"></div> </a>
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
                <a href="{{ route('admin.index')}}">
                    <li>
                        Control usuarios
                    </li>
                </a>
                <a href="{{ route('register.index') }}">
                    <li>
                        Nuevos usuarios
                    </li>
                </a>
                <a href="{{ route('admin.contact')}}">
                    <li>
                        Mensajes
                    </li>
                </a>
                <a href="{{ route('admin.profile')}}">
                    <li>
                        Perfil
                    </li>
                </a>
                <a class="cerrar" href="{{ route('login.logout')}}">
                    <li>
                        Cerrar sesión
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
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
</script>
    @yield('js')
</body>


</html>