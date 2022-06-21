@extends('admin/layout_admin')


@section('content')

<p class="title"></p>
<table>
    <caption>Documentación de usuario</caption>
    <tr>
        <td>
            Nombre del archivo
        </td>
        <td>
            Tipo de archivo
        </td>
        <td>
            Fecha de subida
        </td>
        <td>
            Autor
        </td>
        <td>
            Detalles
        </td>
    </tr>
    @if(count($documentos) > 0)
        
    @else
        
    @endif
    @foreach($documentos as $documento)

    @endforeach
</table>

@endsection