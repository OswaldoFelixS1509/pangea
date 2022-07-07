@extends('admin/layout_admin')

@section('title', 'Nuevo documento')

@section('content')


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Belleza&family=Cormorant:wght@500;600;700&display=swap" rel="stylesheet">
    <div class="formUpload">
    <p class="title">Nuevo documento</p>

    <form method="POST" action="{{ route('admin.createDocument', $user)}}" enctype="multipart/form-data">

  
    @csrf
    @if(Session::get('success'))
    <div class="alert">
      {{Session::get('success')}}
    </div>

    <br>
    @endif
    @if(Session::get('fail'))
    <div class="failalert">
      {{Session::get('fail')}}
    </div>
    <br>
    @endif

    <label for="title">Titulo de la publicación</label> <br>
    <input type="text" class="inputDoc" name="titulo" value="{{ old('titulo')}}"><br>
    @error('titulo')
        <div class="form-error"> 
            {{$message}}
        </div>
      <br>
    @enderror
    <label for="categoria">Categoria</label><br>
    <select class="categoria" name="categoria" id="categoria">
        <option value="Itinerario" selected>Itinerario</option>
        <option value="Calendario" >Calendario</option>
        <option value="PasesAbordar" >Pases de abordar</option>
        <option value="InfoCovid" >Información Covid</option>
        <option value="Tours" >Tours y traslados</option>
        <option value="Imagenes" >Imagenes</option>
    </select>
    @error('categoria')
        <div class="form-error"> 
            {{$message}}
        </div>
      <br>
    @enderror
    <br>
    <label for="Subir archivo"></label> <br>
    <input type="file" value="{{ old('archivos')}}" name="archivos[]" multiple>
    <br>
    @error('archivos')
        <div class="form-error"> 
            {{$message}}
        </div>
      <br>
    @enderror
    <label for="comment">Comentarios:</label>
    <textarea name="comment" id="comment" style="white-space: pre-wrap;" class="txtInputArea" value="{{old('comment')}}" cols="30" rows="10"></textarea>

    <button class="btnSubmit">Subir archivos </button>

    </form>
    </div>




@endsection
