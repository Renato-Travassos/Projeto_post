@extends('inicio')

@section('conteudo')
 
<form action="{{route('web.search')}}" method="GET">
<input type="text" name="query">
<button type="submit" class="btn btn-primary">
                                   pesquisar
                                </button> 
</form>


@if(isset($post))            
<div class="col-8 m-auto">
    <table class="table">
        <thead class="thead-dark">
        
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">   </th>
            <th scope="col">Nome</th>
            
            <th scope="col">Nota</th>
            <th scope="col">Descrição</th>
            <th scope="col">Genêro</th>
            <th scope="col"> </th>
            
          </tr>
        </thead>
        <tbody>
          <tr>
            @forelse($post as $post)
            <th scope="row"></th>
             <td>{{$post->nome}}</td>
            <td> {{$post->nota}}</td>
            <td> {{$post->descrição}}</td>
            <td> {{$post->tipos}}</td>
            <td>
              <div>  
              <img  class="image__img" src="/img/posts/{{$post->image}}">              </div>
                 </td>          
          </tr>
          @empty
    
           <p>este usúario não possui posts</p>



          @endforelse
          
           
        </tbody>
      </table></div> 

@endif

@endsection
      