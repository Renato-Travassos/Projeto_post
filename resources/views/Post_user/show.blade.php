@extends('inicio')

@section('conteudo')
<main>                                                                                            
<h2>Postado por   <a class="no-underline" href="{{ url('/view_user') }}/{{ $post->user_id }}"> <h1> {{$pubOwner['name'] ?? 'Usúario desconhecido'}}</h1>  </a> </h2> 

<h1>Nome:{{$post->nome}}</h1>  

<img  class="image__img" src="/img/posts/{{$post->image}}"> 

 
<h1>Genêro</h1> 
@forelse ($post->tipos as $tipo)
    
      {{ $tipo }} 
@empty
    
    <p>sem</p>
    </main>
@endforelse 
<h1>Descrição</h1>
<h3>{{$post->descrição}}</h3>
<h1>Comentário</h1>
<h3>{{$post->comentário}}</h3> 

@endsection      