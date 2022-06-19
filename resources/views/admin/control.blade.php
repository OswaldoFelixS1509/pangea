@extends('admin/layout_admin')

@section('content')
    <div class="contieneDatos">
    @if(count($users) > 0)
        <table>
            <caption>Control de usuarios</caption>
        @foreach($users as $user)
         
            <tr>
                <td>
                    <div class="datosUsuario">
                        <img src="/images/users/{{$user['profile_picture']}}" class="imgTabla" alt="">
                        <p>{{$user['name']}}</p>
                    </div class="datosUsuario"> 
                </td>
                <td>
                <p class="email">{{$user['email']}}</p>  
                </td>
                <td>
                    @if(Session::get('LoggedUser') == $user['id'])
                        
                    @else
                    <form> @csrf
                    <input type="submit" class="delete" value="Eliminar">
                        </form>
                    @endif
               
                </td>
                <td>
                <input type="button" value="Documentación">
                <td>
                <input type="button" value="Editar datos">
                </td>
                </td>
            </tr>
        
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