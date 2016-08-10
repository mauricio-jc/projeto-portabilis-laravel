@extends('principal.principal')

@section('conteudo')

	<h2>Listagem de usuários do sistema</h2>
	<hr>


	<ol class="breadcrumb">
  		<li class="active">Início</li>
  		<li class="active">Listagem</li>
  		<li class="active">Listagem de usuários</li>
	</ol>

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
		<div class="panel panel-primary">
			<div class="panel-body">
				<table class="table table-hover">
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
									<a href="" class="btn btn-danger" data-toggle="modal" data-target="#{{$user->id}}">
										<span class="glyphicon glyphicon-remove"></span>
										<strong>Excluir</strong>
									</a>
								</td>
							@else
								<td>
									<span class="label label-info">Nenhuma ação permitida</span>
								</td>
							@endif
						</tr>

						<div class="modal fade" id="{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
						    	<div class="modal-content">
						      		<div class="modal-header">
										<h3 class="modal-title" id="myModalLabel">
    	    								<strong>Excluir o(a) usuário(a) {{$user->name}}</strong>
	        							</h3>
	      							</div>
		      						<div class="modal-body">
    		    						<strong>Deseja mesmo excluir o usuário?</strong>
      								</div>
	      							<div class="modal-footer">
      									<a href="/user_del/{{$user->id}}" class="btn btn-success">
      										<span class="glyphicon glyphicon-ok"></span>
        									<strong>Sim</strong>
        								</a>
        								<button type="button" class="btn btn-danger" data-dismiss="modal">
        									<span class="glyphicon glyphicon-remove"></span>
											<strong>Não</strong>
		    	    					</button>
			      					</div>
    							</div>
  							</div>
						</div>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<center>
		<?php echo $usuarios->render(); ?>
	</center>

@stop