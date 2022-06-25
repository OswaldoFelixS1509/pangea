@extends('user/layout_user')

@section('title', 'Documentos')

@section('content')
    <div class="contieneDatos">
        <div class="datosAutor">
            <label class="title">{{$categoria}}</label>
        </div>
        <div class="archivos">
            @foreach($archivos as $archivo)
            
            @endforeach
        </div>
    </div>
@endsection