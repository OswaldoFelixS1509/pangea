@extends('user/layout_user')

@section('title', 'Perfil')

@section('content')

    <div class="contieneDatos">
        @if(count($itinerarios) > 0)
            
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
                @foreach($itinerarios as $itinerario)
                <tr>
                    <td>
                    <p class="email">{{$itinerario['title']}}</p>  
                    </td>
                    <td>
                    <p class="email">{{$autor[$loop->index]}}</p> 
                    </td>
                    <td>
                        <p class="email">{{substr($itinerario['created_at'], 0, 10)  }}</p> 
                    </td>
                    <td>
                        <a href="{{route('user.showDocument', [$itinerario])}}">
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