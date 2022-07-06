@extends('user/layout_user')

@section('title', $categoria)

@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Belleza&family=Cormorant:wght@500;600;700&display=swap" rel="stylesheet">

    <div class="contieneDatos">
        <label class="">{{$categoria}}</label>
        @if(count($posts) > 0)
            
            <table>
                <tr>
                    <td>
                        Titulo
                    </td>
                    <td>
                        Autor
                    </td>
                    <td>
                        Fecha de subida
                    </td>
                    
                    
                </tr>
                @foreach($posts as $post)
                <tr>
                    <td> 
                            <p class="email">{{$post['title']}}</p>  
                    </td>
                    <td>
                    <p class="email">{{$autor[$loop->index]}}</p> 
                    </td>
                    <td>
                        <p class="email">{{substr($post['created_at'], 0, 10)  }}</p> 
                    </td>
                    <td>
                        <a href="{{route('user.showDocument', [$post])}}">
                            <input type="button" value="Documentación">
                        </a>
                    </td>
                    
                </tr>
                @endforeach
            </table>
        @else
        <!-- Dialogo para usuario sin archivos -->
        <label for="title">Aún no se ha publicado ningún archivo para ti</label>
        @endif
    </div>

@endsection
