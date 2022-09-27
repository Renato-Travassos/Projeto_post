@extends('inicio')

@section('conteudo')
<h1>Post</h1>

 <section class="selection"> 
<form action="{{$action}}" method="POST" enctype="multipart/form-data"> 
    @csrf     
    @isset($post)
    @method('PUT')       
    @endisset     
 
 
  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome"  value="{{old('nome',$post->nome ?? '')}}"  placeholder=" post  ">
    @error('nome')
    <div  class="alert alert-danger" role="alert"><small>{{$message}}</small></div>
            @enderror  
   </div>   

    <div class="form-group">
    <label for="Tipo">Tipo</label>
   <select name="tipos[]" id="tipos"    class="selectpicker"  required multiple >
  <optgroup label="Picnic" >
    <option>Ficção científica</option>
    <option>Aventura</option>
    <option>Ação</option>
    <option>  Horror</option>
        <option>  Horror cósmico </option> 
        <option>Ficção</option>           
        <option>Fantasia</option>           
        <option>Colegial</option>           
        <option>Comédia</option>           
        <option>Romance</option>           
        <option>Suspense</option>           
        <option>Dança</option>           
        <option>Mistério</option>           
        <option>Musica</option>           
        <option>Drama</option>           
        <option>Filme</option>           
        <option>Policial</option>           
        <option>Cinema de arte </option>           
        <option>Documentário</option>           
        <option>Espionagem</option>           
        <option>Faroeste</option>           
        <option>Thriller</option>          
     
  </tgroup>
</select>
 

<div class="form-group">
<input type="file" name="image"   /> 
<img class="image__img" src="/img/posts/{{$post->image ?? ''}}">

</div>
 
 
</div>
 
 
  <div class="form-group">
    <label for="nota">Nota</label> 
    <input type="number" class="form-control" id="nota" name="nota" value="{{old('nome',$post->nota ?? '')}}" placeholder="nota">
    @error('nota')
    <div  class="alert alert-danger" role="alert"><small>{{$message}}</small></div>
            @enderror   
  </div>  
  
<div class="form-outline">
<label class="form-label" for="comentário">Comentário</label>
   <textarea class="form-control" id="comentário" name="comentário"   rows="4">{{old('nome',$post->comentário ?? '')}}</textarea>
</div>

<div class="form-outline">
<label class="form-label" for="descrição">Descrição</label>
   <textarea class="form-control" id="descrição" name="descrição"   rows="4">{{old('nome',$post->descrição ?? '')}}</textarea>
</div>

<div class="form-group  ">
<input  type="submit" class="btn btn-primary" value="enviar"> 
<a class="btn btn-danger" href="{{route('posts.index')}}">Cancelar</a> 
</div >
</form>
 
</section>
@endsection