@extends('principal.principal')

@section('conteudo')

	<h2>Listagem de cursos</h2>
	<hr>


	<ol class="breadcrumb">
  		<li class="active">Início</li>
  		<li class="active">Listagem</li>
  		<li class="active">Listagem de cursos</li>
	</ol>

	@if(session()->has('message_error'))
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Este curso não pode ser excluído pois possui vínculo com alguma matricula.
		</div>
	@endif

	<form action="/curso_lst" method="get">
		<div class="form-group col-md-6">
			<label>Nome do curso:</label>
			<input type="text" id="nome" name="nome" class="form-control input-text">
		</div>
		<div class="form-group col-md-6">
			<label>Período:</label>
			<select id="periodo" name="periodo" class="form-control input-text">
				<option value="0">----Selecione----</option>
				<option value="1">Matutino</option>
				<option value="2">Vespertino</option>
				<option value="3">Noturno</option>
				<option value="4">Integral</option>
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
							<th>Curso</th>
							<th>Valor</th>
							<th>Período</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						@foreach($cursos as $curso)
							<tr>
								<td>{{$curso->nome}}</td>
								<td>R$ {{number_format($curso->valor_inscricao, 2, ",", ".")}}</td>
								@if($curso->periodo == 1) 
									<td>Matutino</td>
								@elseif($curso->periodo == 2) 
									<td>Vespertino</td>
								@elseif($curso->periodo == 3) 
									<td>Noturno</td>
								@else($curso->periodo == 4) 
									<td>Integral</td>
								@endif
								<td>
									<a href="/curso_edi/{{$curso->id}}" class="btn btn-success">
										<span class="glyphicon glyphicon-refresh"></span>
										<strong>Editar</strong>
									</a>
									<a href="" class="btn btn-danger" data-toggle="modal" data-target="#{{$curso->id}}">
										<span class="glyphicon glyphicon-remove"></span>
										<strong>Remover</strong>
									</a>
								</td>
							</tr>

							<div class="modal fade" id="{{$curso->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
							    	<div class="modal-content">
							      		<div class="modal-header">
											<h3 class="modal-title" id="myModalLabel">
    	    									<strong>Excluir o(a) curso(a) {{$curso->nome}}</strong>
	        								</h3>
	      								</div>
		      							<div class="modal-body">
    		    							<strong>Deseja mesmo excluir este curso?</strong>
      									</div>
		      							<div class="modal-footer">
    	  									<a href="/curso_del/{{$curso->id}}" class="btn btn-success">
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
				<a href="/curso_cad" class="btn btn-default">
					<span class="glyphicon glyphicon-plus"></span>
					<strong>Novo curso</strong>
				</a>
			</div>
		</div>
	</div>

	<center>
		<?php echo $cursos->render(); ?>
	</center>
@stop