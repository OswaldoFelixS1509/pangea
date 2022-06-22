@extends('admin/layout_admin')


@section('content')
    <div class="documentList">
        <p class="title">Documentación del usuario {{$user->name}}</p>
    
    
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
        
    </tr>
    @foreach($documentos as $documento)
    <tr>
        <td>
        <p class="email">{{$documento['title']}}</p>  
        </td>
        <td>
        <p class="email">{{$documento['category']}}</p> 
        </td>
        <td>
            <p class="email">{{$documento['created_at']}}</p> 
        </td>
        <td>
            <input type="submit" class="delete" value="Eliminar">
        </td>
        <td><a href="{{ route('admin.edit', $user)}}"><input type="button" value="Editar comentario"></a></td>
    </tr>
    @endforeach
    </table>
    {{$documentos->links()}}
    @else
    
        <p class="msg">El usuario {{$user->name}} aún no tiene documentos</p>
        
    
    @endif
   
    <a href="{{ route('admin.createDocument',  $user)}}"> <button class="btnSubmit">Subir un nuevo archivo</button></a>
    </div>
@endsection