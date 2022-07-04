@extends('user/layout_user')

@section('title', 'Documentos')

@section('content')
    <div class="contieneDatos">
        <div class="datosAutor">
            <h1 style="font-size:2em; font-weight: bold; text-align: center;">Documentación</h1><br>
        </div>
        <div class="datosAutor">
            <h2 style="font-size:1.5em; font-weight: bold; text-align: left;">Comentarios:</h2><br>
            <p> <pre> {{  $post['comment'] $post}}</pre> </p>
        </div>
        <div class="datosAutor">
            <h2 style="font-size:1.5em; font-weight: bold; text-align: left;">Archivos:</h2><br>
        </div>
        
        <div class="contieneArchivos">
            @foreach($archivos as $archivo)
                <label style="font-size:1.5em; font-weight: bold;">{{$archivo['fileName']}}</label>
                
                @if($archivo['type'] == 'pdf' ||  $archivo['type'] == 'docx')
                    <iframe src="{{ asset('storage/files/users/' . Session::get('Slug') . '/'. $post['id']  . '/' .$archivo['fileName'])}}" width="100%" height="600px" class="frame" frameborder="0"></iframe>
                @endif  
                @if($archivo['type'] == 'mp4' ||  $archivo['type'] == 'ogg')
                        <video src="{{ asset('storage/files/users/' . Session::get('Slug') . '/'. $post['id']  . '/' .$archivo['fileName'])}}" controls>
                        </video>  
                @endif   
                @if($archivo['type'] == 'png' ||  $archivo['type'] == 'jpg' ||  $archivo['type'] == 'jpeg' ||  $archivo['type'] == 'gif' ||  $archivo['type'] == 'svg')  
                    <img src="{{ asset('storage/files/users/' . Session::get('Slug') . '/'. $post['id']  . '/' .$archivo['fileName'])}}" class="docImage" alt="">
                @endif
                <a class="btn btn-primary" href="{{ route('user.download', $post['id'] ) }}" role="button">Descargar archivo</a>
                <br>
            @endforeach
        </div>
    </div>
@endsection