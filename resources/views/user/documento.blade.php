@extends('user/layout_user')

@section('title', 'Documentos')

@section('content')
    <div class="contieneDatos">
        <div class="datosAutor">
            <h1 style="font-size:2em; font-weight: bold; text-align: center;">Documentación</h1><br>
        </div>
        <div class="datosAutor">
            <h2 style="font-size:1.5em; font-weight: bold; text-align: left;">Comentarios:</h2><br>
            <p> <pre> {{  $post['comment']}}</pre> </p>
        </div>
        <div class="datosAutor">
            <h2 style="font-size:1.5em; font-weight: bold; text-align: left;">Archivos:</h2><br>
        </div>
        
        <div class="contieneArchivos">
            @foreach($archivos as $archivo)
                <label style="font-size:1.5em; font-weight: bold;">{{$archivo['fileName']}}</label>
                
                @if($archivo['type'] == 'pdf' ||  $archivo['type'] == 'docx')
                    <iframe src="{{ asset('storage/files/users/' . Session::get('Slug') . '/'. $post['id']  . '/' .$archivo['fileName'])}}" width="100%" height="600px" class="frame" frameborder="0"></iframe>
                @else
                    <img src="{{ asset('storage/files/users/' . Session::get('Slug') . '/'. $post['id']  . '/' .$archivo['fileName'])}}" class="docImage" alt="">
                @endif         
            @endforeach
        </div>
    </div>
@endsection