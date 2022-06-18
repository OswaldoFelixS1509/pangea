<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" type="text/css" href="{{url('css/layoutuser.css')}}">
    <meta charset="utf-8">
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
                    <a href="{{ route('admin.profile')}}">Perfil</a>
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


</html>