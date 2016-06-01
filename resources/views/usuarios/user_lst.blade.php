@extends('principal.principal')

@section('conteudo')

	<h2>Listagem de usuários do sistema</h2>
	<hr>

	<form action="#" method="get">
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
				Buscar
			</button>
		</div>
	</form>

	<div class="col-md-12">
		<table class="table table-bordered table-hover table-background">
			<thead>
				<tr>
					<td>Código</td>
					<td>Nome</td>
					<td>E-mail</td>
					<td>Administrador</td>
					<td>Ações</td>
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
								<a href="#" class="btn btn-success">
									<span class="glyphicon glyphicon-refresh"></span>
									Editar
								</a>
								<a href="#" class="btn btn-danger">
									<span class="glyphicon glyphicon-remove"></span>
									Excluir
								</a>
							</td>
						@else
							<td>
								<a href="#" class="btn btn-info">
									<span class="glyphicon glyphicon-remove"></span>
									Ação não permitida
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