@extends('admin.adm')

@section('content') 
<h1>Tabela de Admin</h1>

<table class="table table-bordered data-table">
        <thead>
            <tr>
                 
                <th>Nome</th>
 
                <th>Email </th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
           
            @foreach($users as $user)
                <tr>
                      
                    <td>  <h3><a class="no-underline" href="{{route('admin.sobre',$user->id)}}">{{ $user->name }}</a></h3> </td>
                    <td>   {{ $user->email }}   @if(Cache::has('user-is-online-' . $user->id))
                            <span class="text-success">Online</span>
                        @else
                            <span class="text-secondary">Offline</span>
                        @endif</td>
                     
                     
                    <td>
                        
                         
   
             
           <a  class="btn btn-primary no-underline" href="{{route('admin.show',$user->id)}}" title="sobre">ver</a> 
                                
    <form action="{{route('admin.destroy',$user->id)}}" method="POST"   title="deletar">
                  @csrf
                  @method('DELETE')
               <button class="fa fa-trash text-danger"
       type="submit" title="deletar" onclick="return confirm(' Tem certeza de deletar este perfil?')"> </button>
       </form>



                       <a href="{{route('admin.edit',$user->id)}}" title="editar"><i class="fas fa-pen"> </i></a>    
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>

@endsection