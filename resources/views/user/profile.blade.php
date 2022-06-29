@extends('admin/layout_admin')

@section('title', 'Perfil')

@section('content')
<div class="contieneDatos">
<h1 style="font-size:2em; ">Mi perfil</h1><br>
    <label>Nombre de usuario:</label>
    <label> <i class="material-icons md-48">email</i>{{$user['username']}}</label>
    <label>Nombre completo:<img src="{{url('images/Mesa de trabajo 5.png')}}" style="float:left;width:.5in;height:.5in"></label>
    <label>{{$user['name']}}</label>
    <label>Correo electronico:<img src="{{url('images/Mesa de trabajo 5.png')}}" style="float:left;width:.5in;height:.5in"></label>
    <label>{{$user['email']}}</label>
    <label>Mis fotos:<img src="{{url('images/Mesa de trabajo 5.png')}}" style="float:left;width:.5in;height:.5in"></label>
    
</div>
<br>

@endsection