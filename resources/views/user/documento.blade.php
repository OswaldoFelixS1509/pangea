@extends('user/layout_user')

@section('title', 'Documentos')

@section('content')
    <div class="contieneDatos">
        <div class="datosAutor">
            <h1 style="font-size:2em; font-weight: bold; text-align: center;">Documentación</h1><br>
        </div>
        <div class="archivos">
            @foreach($archivos as $archivo)
                <label style="font-size:1.5em; font-weight: bold;">*Titulo del archivo*</label>
                <table>
                <tr>
                    <td style="text-align: center; font-size:10em;">
                        *Contenido*
                    </td>
                </tr>
                </table>
            @endforeach
        </div>
    </div>
@endsection