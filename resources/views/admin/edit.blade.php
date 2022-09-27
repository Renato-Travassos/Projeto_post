@extends('admin.adm')

@section('content') 

<body>
@if (isset($errors)&& count($errors)>0)
     
        @foreach ($errors->all() as $erro)
            <h3 style="text-align:center;"> {{$erro}}</h3>
        @endforeach
        
     @endif 

    <div class="d-flex justify-content-center p-2 m-2">
        <div class="card p-2 w-50">

            <div class="d-flex justify-content-between">
                <div class="">
                    <h3>Edit User</h3>
                </div>
                <div class="">
                    <a href="{{route('admin.tabela')}}"><button class="btn btn-primary"><i class="fa fa-list"></i> 
                            Lista de Usúarios</button></a>
                </div>
            </div>
            <hr class="my-1">
            <form action="{{$action}}" method="post" enctype="multipart/form-data">
            @csrf     
        @isset($user)
        @method('PUT')       
        @endisset 
                <div class="row">
                    <div class="col">
                        <label for="">Nome</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name ?? '' }}"
                            placeholder="introduza o nome aqui">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="">Email  </label>
                        <input type="email" name="email" class="form-control" value="{{ $user->email ?? '' }}"
                            placeholder="Introduza o email aqui...">
                          
    
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <label for="">é admin?</label>
                        <input type="number" name="is_admin" value="{{ $user->is_admin ?? '' }}" class="form-control"
                            placeholder="Confirme aqui,usúario=0,Admin=1">
                    </div>
                </div>
    
                <div class="my-2">
                    <button type="submit" class="btn btn-success w-100" value="editar usúario">Update</button>
                </div>
            </form>
        </div>
    </div>
</body>







@endsection