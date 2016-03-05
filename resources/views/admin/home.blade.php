@extends('layout.principal')

@section('content')
<h3>Bem vindo, {{ Auth::user()->name }}.</h3>
<table ng-repeat="municipio in municipios">
	<%municipio.nome%>
</table>
@endsection

@section('sidebar')
<ul class="list-group">
	<li class="list-group-item disabled">Usuários</li>
	<li class="list-group-item"><a href="auth/register">Cadastrar usuário</a></li>
	<li class="list-group-item">Pesquisar usuários</li>
</ul>
@endsection