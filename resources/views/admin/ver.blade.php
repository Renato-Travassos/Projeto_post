@extends('admin.adm')

@section('content') 


<h1>admin</h1>

<body>
    <div class="d-flex justify-content-center p-2 m-2">
        <div class="card p-2 w-50">
            <div class="d-flex justify-content-between">
                <div class="">
                    <h3>Perfil do Usúario</h3>
                </div>
                 
            </div>
            <hr class="my-1 mb-2">
            <div class="row">
                 
                <div class="col-8">
                    <h6>  Informação Geral</h6>
                    <h3><a class="no-underline" href="{{route('admin.sobre',$user->id)}}">Posts</a></h3>
                    <hr class="my-1">
                    <div class="d-flex justify-content-between">
                        <label class="">Id :</label>
                        <span class="text-primary">{{ $user->id }}</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <label class="">Name :</label>
                        <span class="text-primary">{{ $user->name }}</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <label class="">Email Id :</label>
                        <span class="text-primary">{{ $user->email }}</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <label class="">Password :</label>
                        <span class="text-primary">{{ $user->password }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
 



@endsection