@extends('inicio')

@section('conteudo') 


<div  class="col-8 m-auto">
    <table class="table">
        <thead class="thead-dark">
        
      <table class="table">
        <thead class="thead-dark">
          <tr>
            
            <th scope="col"> </th>
            <th scope="col">Nome</th>
            <th scope="col">Nota</th>
            <th scope="col"> Descrição</th>
            <th scope="col"> Genêro</th>
            <th scope="col">imagem</th>
            <th scope="col">Opções</th>
            <th scope="col">Comentário</th>
             
          </tr>
        </thead>
        <tbody>
          <tr>
            @forelse($post as $posts)
             
            <th scope="row"></th>
             <td>{{$posts->nome}}</td>
            <td> {{$posts->nota}}</td>
            <td> {{$posts->descrição}}</td>
            <td>  
               
          </td>
            <td>   
            <img  class="image__img" src="/img/posts/{{$posts->image}}">
                
                    </div> 
           </td>
            
              <td> 
            
             <a href="{{route('posts.edit',$posts->id)}}" title="editar"><i class="fas fa-pen"> </i></a>    
            
            <form action="{{route('posts.destroy',$posts->id)}}" method="POST"   title="deletar">
                  @csrf
                  @method('DELETE')
               <button
       type="submit" title="deletar"><i class="fas fa-trash-alt "></i></button></form></td>
       <td>{{$posts->comentário}}</td>
          </tr>
          
         @empty 


         <p>Você não possui posts</p>
          @endforelse
        </tbody>
      </table></div> 
@endsection     