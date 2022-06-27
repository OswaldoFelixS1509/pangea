@extends('admin/layout_admin')

@section('title', 'Perfil')

@section('content')
<div class="contieneDatos">
<h1 style="font-size:2em; ">Mi perfil</h1><br>
    <label>Nombre de usuario:</label>
    <label>*Nombre de usuario*</label>
    <label>Nombre completo:<img src="{{url('images/Mesa de trabajo 5.png')}}" style="float:left;width:.5in;height:.5in"></label>
    <label>*Nombre completo*</label>
    <label>Numero telefonico:<img src="{{url('images/Mesa de trabajo 5.png')}}" style="float:left;width:.5in;height:.5in"></label>
    <label>*Numero telefonico*</label>
    <label>Correo electronico:<img src="{{url('images/Mesa de trabajo 5.png')}}" style="float:left;width:.5in;height:.5in"></label>
    <label>*Numero telefonico*</label>
    <label>Mis fotos:<img src="{{url('images/Mesa de trabajo 5.png')}}" style="float:left;width:.5in;height:.5in"></label>
</div>
<br>

@endsection