@extends('principal.principal')

@section('conteudo')

	<h1>Bem-vindo ao sistema!</h1>
	<hr>
	
	<div class="col-md-4">
		<div class="row">
			<label>Listar usuários</label>
		</div>
		<a href="/user_lst">
			<img src="images/users.png" alt="users" class="img-rounded">
		</a>
	</div>

	<div class="col-md-4">
		<div class="row">
			<label>Listar cursos</label>
		</div>
		<a href="/curso_lst">
			<img src="images/courses.png" alt="users" class="img-rounded">
		</a>
	</div>

	<div class="col-md-4">
		<div class="row">
			<label>Sair do sistema</label>
		</div>
		<a href="/logout" onclick="return confirm('Deseja mesmo sair do sistema?');">
			<img src="images/exit.png" alt="users" class="img-rounded">
		</a>
	</div>
@stop