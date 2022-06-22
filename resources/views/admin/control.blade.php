@extends('admin/layout_admin')

@section('content')
    <div class="contieneDatos">
    @if(count($users) > 1)
        <table>
            <caption>Control de usuarios</caption>
            <tr>
        <td>
            Nombre completo
        </td>
        <td>
            Nombre de usuario
        </td>
        <td>
            Email
        </td>
       
    </tr>
        @foreach($users as $user)
            @if(Session::get('LoggedUser') != $user['id'] && $user['id'] != 1)
            <tr>
                <td>
                    <div class="datosUsuario">
                        @if($user['profile_picture'] == "user_picture.png")
                            <img src="{{asset('storage/images/users/'.$user['profile_picture'])}}" class="imgTabla">
                        @else
                            <img src="{{asset('storage/images/users/'.$user['id'].'/'.$user['profile_picture']) }}" class="imgTabla">
                        @endif
                        
                        <p>{{$user['name']}}</p>
                    </div class="datosUsuario"> 
                </td>
                <td>
                <p class="email">{{$user['username']}}</p>  
                </td>
                <td>
                <p class="email">{{$user['email']}}</p>  
                </td>
                
                <td>
                    <form> @csrf
                    <input type="submit" class="delete" value="Eliminar">
                        </form>
               
                </td>
                <td>
                 <a href="{{ route('admin.documents', $user)}}"><input type="button" value="Documentación"> </a>
                <td>
                <a href="{{ route('admin.edit', $user)}}"><input type="button" value="Editar datos"></a>
                </td>
                </td>
            </tr>
            @endif
        @endforeach
        </table>
        <br>
        {{$users->links()}}
        
    @else
    <div class="mensajeUsuarios">
        <p> Ningún usuario ha sido registrado<br> </p>
        <a href="{{ route('register.index') }}"><p>Registra a tu primer usuario!</p></a>

    </div>
        
    @endif
    </div>
@endsection

@section('js')
   
@endsection