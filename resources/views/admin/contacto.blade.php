@extends('admin/layout_admin')

@section('title', 'Mensajes de contacto')

@section('content')

<div class="contieneDatos">

    
    @if(Session::get('success'))
        <div class="alert">
            {{Session::get('success')}}
        </div>
        <br>
    @endif
    
    @if(count($mensajes) > 1)
        <table>
            <caption>Mensajes de contacto</caption>
            
            <tr>
        <td>
            Nombre completo
        </td>
        <td>
            Email
        </td>
        <td>
            Número de telefono
        </td>
        <td>
            Status
        </td>
       
        </tr>
        @foreach($mensajes as $mensaje)
           
            <tr>
                <td>
                    <div class="datosUsuario">
                        
                        <p>{{$mensaje['nombre']}}</p>
                    </div class="datosUsuario"> 
                </td>
                <td>
                <p class="email">{{$mensaje['correo']}}</p>  
                </td>
                <td>
                <p class="email">{{$mensaje['telefono']}}</p>  
                </td>
                <td>
                    @if($mensaje['leido'] == 0)
                    <p class="email">No leido</p>  
                    @else
                    <p class="email">Leido</p>  
                    @endif
                </td>
                <td>
                    <form action="{{ route('admin.messageDestroy',  $mensaje->id)}} " method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="delete" value="Eliminar">
                    </form>
                <td>
                <a href="{{ route('admin.message', $mensaje)}}"><input type="button" value="Ver mensaje"></a>
                </td>
                </td>
            </tr>
           
        @endforeach
        </table>
        <br>
        {{$mensajes->links()}}

        @else
        <p class="title">Mensajes de contacto</p>
        <br>
        <p width="100%" class="emptyTable">Por el momento nadie ha enviado un mensaje</p>
        
    @endif
    </div>


@endsection