@extends('principal.principal')

@section('css')
	<link rel="stylesheet" type="text/css" href="vendor/css/jquery-ui.min.css">
@stop

@section('conteudo')
	
	<h2>Listagem de matrículas</h2>
	<hr>

	<form action="/matricula_lst" method="get">
		<div class="form-group col-md-2">
			<label>Ano da matrícula:</label>
			<input type="text" id="ano" name="ano" class="form-control input-text">
		</div>
		<div class="form-group col-md-5">
			<label>Aluno:</label>
			<input type="text" id="aluno_id" name="aluno_id" class="form-control input-text" placeholder="Campo auto-complete">
		</div>
		<div class="form-group col-md-5">
			<label>Curso:</label>
			<input type="text" id="curso_id" name="curso_id" class="form-control input-text" placeholder="Campo auto-complete">
		</div>
		<div class="form-group col-md-7">
			<label>Situação:</label>
			<select id="ativo" name="ativo" class="form-control input-text">
				<option value="-1">Todos</option>
				<option value="1">Ativos</option>
				<option value="0">Inativos</option>
			</select>
		</div>
		<div class="checkbox col-md-5">
    		<label class="label_pago"><input type="checkbox" class="pago" id="pago" name="pago" value="0"> <strong>Pago</strong></label>
  		</div>
  		<div class="form-group col-md-12">
			<button type="submit" id="buscar" name="buscar" class="btn btn-success">
				<span class="glyphicon glyphicon-search"></span>
				<strong>Buscar</strong>
			</button>
		</div>
	</form>

	<div class="col-md-12">
		<table class="table table-bordered table-hover table-background">
			<thead>
				<tr class="active">
					<th>Aluno</th>
					<th>Curso</th>
					<th>Ano</th>
					<th>Situação</th>
					<th>Pago</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				@foreach($matriculas as $matricula)
					<tr>
						<td>{{$matricula->nome_aluno}}</td>
						<td>{{$matricula->curso_nome}}</td>
						<td>{{$matricula->ano}}</td>
						<td>{{$matricula->ativo == 1 ? 'Ativo' : 'Inativo'}}</td>
						<td>{{$matricula->pago == 1 ? 'Sim' : 'Não'}}</td>
						<td>
							@if($matricula->ativo == 1)
								<a href="/matricula_desat/{{$matricula->id}}" class="btn btn-warning" onclick="return confirm('Deseja mesmo inativar esta matrícula?');">
									<span class="glyphicon glyphicon-remove"></span>
									<strong>Inativar</strong>
								</a>
							@else
								<a href="/matricula_ati/{{$matricula->id}}" class="btn btn-success" onclick="return confirm('Deseja mesmo ativar a matrícula?');">
									<span class="glyphicon glyphicon-ok" ></span>
									<strong>Ativar</strong>
								</a>
							@endif
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$matricula->id}}">
								<span class="glyphicon glyphicon-search"></span>
  								<strong>Visualizar</strong>
							</button>
							<a href="/matricula_del/{{$matricula->id}}" class="btn btn-danger" onclick="return confirm('Deseja mesmo excluir esta matrícula?');">
								<span class="glyphicon glyphicon-trash"></span>
  								<strong>Excluir</strong>
							</a>
						</td>
					</tr>
					<div class="modal fade" id="{{$matricula->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  						<div class="modal-dialog" role="document">
    						<div class="modal-content">
      							<div class="modal-header">
        							<h3 class="modal-title" id="myModalLabel">
        								<strong>Detalhes da matrícula</strong>
        							</h3>
      							</div>
      							<div class="modal-body">
        							<strong>Código da matrícula: </strong>{{$matricula->id}} <br>
        							<strong>Nome: </strong>{{$matricula->nome_aluno}} <br>
        							<strong>Curso: </strong>{{$matricula->curso_nome}} <br>
        							<strong>Ano: </strong>{{$matricula->ano}} <br>
        							<strong>Situação: </strong>{{$matricula->ativo == 1 ? 'Ativo' : 'Inativo'}} <br>
        							<strong>Pago: </strong>{{$matricula->pago == 1 ? 'Sim' : 'Não'}} <br>
        							<strong>Período: </strong>{{$matricula->periodo}} <br>
        							<strong>Telefone: </strong>{{$matricula->telefone}} <br>
        							<strong>Data de nascimento: </strong><?php echo date_format(new DateTime($matricula->data_nascimento), 'd/m/Y'); ?>
      							</div>
      							<div class="modal-footer">
        							<button type="button" class="btn btn-inverse" data-dismiss="modal">
        								<span class="glyphicon glyphicon-remove"></span>
        								<strong>Fechar</strong>
        							</button>
      							</div>
    						</div>
  						</div>
					</div>
				@endforeach
			</tbody>
		</table>
	</div>

	<div class="col-md-6 col-md-offset-5"> 
		<?php echo $matriculas->render(); ?>
	</div>
@stop

@section('links')
	<script src="../vendor/js/jqueryMask.js"></script>
	<script src="../vendor/js/jquery-ui.min.js"></script>
	<script>
		$(function (){
			$('#aluno_id').autocomplete({
            	source : 'buscaraluno'
			});
		});

		$(function (){
			$('#curso_id').autocomplete({
            	source : 'buscarcurso'
			});
		});

		jQuery(function($){
            $("#ano").mask("9999");
        });
	</script>
@stop