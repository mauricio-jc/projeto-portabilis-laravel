@extends('principal.principal')

@section('conteudo')

	<h2>Listagem de usuários do sistema</h2>
	<hr>

	<form action="/user_lst" method="get">
		<div class="form-group col-md-3">
			<label>Código:</label>
			<input type="text" id="id" name="id" class="form-control input-text">
		</div>
		<div class="form-group col-md-9">
			<label>Nome:</label>
			<input type="text" id="name" name="name" class="form-control input-text">
		</div>
		<div class="form-group col-md-6">
			<label>E-mail:</label>
			<input type="email" id="email" name="email" class="form-control input-text">
		</div>
		<div class="form-group col-md-6">
			<label>Administrador:</label>
			<select id="admin" name="admin" class="form-control input-text">
				<option value="">Todos</option>
				<option value="0">Não</option>
				<option value="1">Sim</option>
			</select>
		</div>
		<div class="form-group col-md-12">
			<button type="submit" id="buscar" name="buscar" class="btn btn-primary">
				<span class="glyphicon glyphicon-search"></span>
				<strong>Buscar</strong>
			</button>
		</div>
	</form>

	<div class="col-md-12">
		<table class="table table-bordered table-hover table-background">
			<thead>
				<tr class="active">
					<th>Código</th>
					<th>Nome</th>
					<th>E-mail</th>
					<th>Administrador</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				@foreach($usuarios as $user)
					<tr>
						<td>{{$user->id}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						@if($user->admin == 1)
							<td>Sim</td>
						@else
							<td>Não</td>
						@endif
						@if(Auth::user()->admin == 1)
							<td>
								<a href="/user_edi/{{$user->id}}" class="btn btn-success">
									<span class="glyphicon glyphicon-refresh"></span>
									<strong>Editar</strong>
								</a>
								<a href="/user_del/{{$user->id}}" class="btn btn-danger" onclick="return confirm('Deseja mesmo excluir este usuário?');">
									<span class="glyphicon glyphicon-trash"></span>
									<strong>Excluir</strong>
								</a>
							</td>
						@else
							<td>
								<a href="#" class="btn btn-info">
									<span class="glyphicon glyphicon-remove"></span>
									<strong>Ação não permitida</strong>
								</a>
							</td>
						@endif
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<div class="col-md-12">
		<?php echo $usuarios->render(); ?>
	</div>

@stop