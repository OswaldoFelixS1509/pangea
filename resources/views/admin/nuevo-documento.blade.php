@extends('admin/layout_admin')

@section('content')




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
        <option value="calendario" >Calendario</option>
        <option value="pasesAbordar" >Pases de abordar</option>
        <option value="infoCovid" >Información Covid</option>
        <option value="imagenes" >Imagenes</option>
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
    <textarea name="comment" id="comment" class="ck-content" value="{{old('comment')}}" cols="30" rows="10"></textarea>

    <button class="btnSubmit">Subir archivos </button>

    </form>
    </div>




@endsection

@section('js')
<script>
    ClassicEditor
    .create( document.querySelector( '#comment' ), {
        language: 'es',
        toolbar: [ 'heading', '|',
        'fontfamily', 'fontsize', '|',
         'bold', 'italic', 'link', '|',
          'undo', 'redo', 'numberedList', 'bulletedList' ],
    } )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
</script>
@endsection