@extends('inicio')

@section('conteudo')

<main>
<form action="{{route('web.search')}}" method="GET">
<input   type="text" name="query" >
<button type="submit" class="btn btn-primary">
                                   pesquisar
                                </button>
</form>
@if(isset($posts))    
<div class="border">Posts</div>            
          <div>
            @foreach($posts as $post)              
              <div class="image" >
              <img class="image__img" src="/img/posts/{{$post->image}}">
              <div class="image__overplay"  > 
               <p>{{$post->nome}}</p>
               
              <a  class="no-underline" href="{{route('posts.show',$post->id)}}" title="sobre">ver mais</a>
              
              </div> 
              </div>
             
 
          @endforeach
          
          {{$posts->links('shared.pagination')}}
         
</main>
      
@endif

@endsection
      