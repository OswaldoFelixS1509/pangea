<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   
    <meta charset="utf-8">
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Yield is a mark for content sections -->
        <title>@yield('title')</title>
        
        <link rel="stylesheet" type="text/css" href="{{url('css/layoutuser.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/layout.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/forms.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/aboutUs.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/controlUsuarios.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/layout_admin.css')}}">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>

<body>
<header>
            <div class="header1" id="header1">
                <div class="left" id="left"></div>
                <div class="logo" id="logo"> <a href="{{ route('header.index')}}"><img src="{{url('images/logo_pangea.png')}}"  width="123px" height="84px"> </a></div>
                <div class="left" id="left"></div>
            </div>
</header>
<div class="row">
            <aside>

            
            <ul>
            <div class="profilePicture">
                <img src="/images/users/user_picture.png" alt="">
            </div>
                <li>
                    <a href="{{ route('admin.index')}}">Control usuarios</a>
                </li>

                <li>
                    <a href="{{ route('register.index') }}">Nuevos usuarios</a>
                </li>
                <li>
                    <a href="{{ route('admin.contact')}}">Mensajes</a>
                </li>
                <li>
                    <a href="{{ route('admin.profile')}}">Perfil</a>
                </li>
                <li>
                    <a class="cerrar" href="{{ route('login.logout')}}">Cerrar sesión </a>
                </li>
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