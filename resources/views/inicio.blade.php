<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         
<link rel="stylesheet" href="{{url('assets/site/estilo.css')}}"> 
<link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.min.css')}}">  


<div class="menu" >

@auth
 <nav>
<a class="no-underline" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">sair</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form> 
@endauth
@guest
<a class="no-underline" href="/login">Entrar</a>
<a class="no-underline" href="/register">Cadastrar</a>
@endguest 
<a class="no-underline" href="{{route('posts.index')}}">Posts</a>
<a class="no-underline" href="{{route('posts.create')}}">criar post</a>
<a class="no-underline"  href="/online-user">Usúarios</a>
<a class="no-underline"  href="/dashboard_user">Meus posts</a>
  

</nav>    
</div>
<div style="text-align:right;">
@if(isset(Auth::user()->email))
<h1> Usúario:{{Auth::user()->name}}</h1>
@endif  

@if(session('sucesso'))
<p   class="btn btn-success mensagem" >{{session('sucesso')}}</p>  
@elseif(session('deletado'))
<p   class="btn btn-danger mensagem">{{session('deletado')}}</p>
@endif
</div>
@yield('conteudo') 
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>