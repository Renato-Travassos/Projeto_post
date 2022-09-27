@extends('admin.adm')

@section('content') 

<main>
<form action="{{route('admin.search')}}" method="GET">
<input   type="text" name="query" >
<button type="submit" class="btn btn-primary">pesquisar </button>
</form>

@if(isset($posts))    
<div class="border">Filmes E Desenhos</div>            
          <div>
            @foreach($posts as $post)              
              <div class="image" >
                
              <img class="image__img" src="/img/posts/{{$post->image}}">
              
              <div class="image__overplay"  > 
               <p>{{$post->nome}}</p>
               
              <a  class="no-underline" href="{{route('posts.show',$post->id)}}" title="sobre">ver mais</a>
               
              <form action="{{route('posts.destroy',$post->id)}}" method="POST"   title="deletar">
                  @csrf
                  @method('DELETE')
               <button
       type="submit" title="deletar"><i class="fas fa-trash-alt "></i></button></form>
              </div> 
              
              
              </div>
          @endforeach
          
          {{$posts->links('shared.pagination')}}
         
</main>
      
@endif
@endsection