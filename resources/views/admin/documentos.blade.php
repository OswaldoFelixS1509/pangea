@extends('admin/layout_admin')

@section('title', 'Documentación')

@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Belleza&family=Cormorant:wght@500;600;700&display=swap" rel="stylesheet">
    <div class="documentList">
        <p class="title">Documentación del usuario {{$user->name}}</p>
    
        @if(Session::get('success'))
            <div class="alert">
                {{Session::get('success')}}
            </div>
            <br>
        @endif
        
<br>
    @if(count($documentos) > 0)
    <table>
    <tr>
        <td>
            Titulo
        </td>
        <td>
            Categoria
        </td>
        <td>
            Fecha de subida
        </td>
        <td>
            Autor
        </td>
        
    </tr>
    @foreach($documentos as $documento)
    <tr>
        <td>
        <p class="email">{{$documento['title']}}</p>  
        </td>
        <td>
            @if($documento['category'] == 'pasesAbordar')
                <p class="email">Pases de abordar</p> 
            @else
                <p class="email">{{$documento['category']}}</p> 
            @endif
        
        </td>
        <td>
            <p class="email">{{$documento['created_at']}}</p> 
        </td>
        <td>
            <p class="email">{{$autor[$loop->index]}}</p> 
        </td>
        <td>
            <form action="{{ route('admin.documentDestroy',  ['user' => $user, 'documento' => $documento->id])}} " method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" class="delete" value="Eliminar">
            </form>
            
        </td>
    </tr>
    @endforeach
    </table>
    {{$documentos->links()}}
    @else
    
        <p class="msg" style="font-weight: bold;">El usuario {{$user->name}} aún no tiene documentos</p>
        
    
    @endif
   
    <a href="{{ route('admin.createDocument',  $user)}}"> <button class="btnSubmit">Subir un nuevo archivo</button></a>
    </div>
@endsection