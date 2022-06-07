<!DOCTYPE html>
<!-- This template will only be used in contact and about is, etc -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Yield is a mark for content sections -->
        <title>@yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{{url('css/site.css')}}">
    </head>

    <body>
        <header>
            <section class="header1">
                <div class="left"></div>
                <div class="logo"> <img src="{{url('images/logo_pangea.png')}}"  width="123px" height="84px">  </div>
                <div class="login"> <p>Inicia sesión </p> </div>
            </section>
        <!-- Add second header -->
        </header>
        <!-- This section is where we will show the content -->
        <div class="content">
            @yield('content')
            Contenido de ejemplo
            Contenido extra de ejemplo
            Linea 4 para probar git
        </div>
        <!-- Footer information -->
        <footer>
                <div class="footerleft">
                    texto 1
                </div>
                <div class="footerright">
                    texto 2
                </div>
        </footer>
    </body>

</html>