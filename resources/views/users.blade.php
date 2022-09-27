@extends('inicio')

@section('conteudo')

<div class="container">
    <h1>Lista de usúarios online/Offline</h1>
  
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                
                <th>Nome</th>
 
                <th>última vez visto </th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
           
            @foreach($users as $user)
                <tr>
                     
                    <td>  <a class="no-underline" href="{{ url('view_user') }}/{{ $user->id }}">   {{ $user->name }}   </a> </td>
                     
                    <td>
                        {{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
                    </td>
                    <td>
                        @if(Cache::has('user-is-online-' . $user->id))
                            <span class="text-success">Online</span>
                        @else
                            <span class="text-secondary">Offline</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>
@endsection 