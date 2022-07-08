@extends('user/layout_user')

@section('title', 'Subir fotos')

@section('content')


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Belleza&family=Cormorant:wght@500;600;700&display=swap" rel="stylesheet">
    <div class="formUpload">
    <p class="title">Subir fotos</p>

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

    <input type="text" class="inputDoc" name="titulo" value="{{'Imagenes'}}" style="display: none;"><br>
    @error('titulo')
        <div class="form-error"> 
            {{$message}}
        </div>
      <br>
    @enderror
    <select class="categoria" name="categoria" id="categoria" style="display: none;">
        <option value="Imagenes" selected>Imagenes</option>
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
    <textarea name="comment" id="comment" style="white-space: pre-wrap; display:none;" class="txtInputArea" value="" cols="30" rows="10"></textarea>

    <button class="btnSubmit">Subir archivos </button>

    </form>
    </div>




@endsection
