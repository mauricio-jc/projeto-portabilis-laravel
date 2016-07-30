@extends('principal.principal')

@section('conteudo')

	<h2>Listagem de alunos</h2>
	<hr>

	<ol class="breadcrumb">
  		<li class="active">Início</li>
  		<li class="active">Listagem</li>
  		<li class="active">Listagem de alunos</li>
	</ol>

	@if(session()->has('message_error'))
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Este aluno não pode ser excluído pois possui vínculo com alguma matricula.
		</div>
	@endif

	<form action="/aluno_lst" method="get">
		<div class="form-group col-md-2">
			<label>Código do aluno:</label>
			<input type="text" class="form-control input-text" id="id" name="id">
		</div>
		<div class="form-group col-md-10">
			<label>Nome do aluno:</label>
			<input type="text" class="form-control input-text" id="nome" name="nome">
		</div>
		<div class="form-group col-md-6">
			<label>CPF do aluno:</label>
			<input type="text" class="form-control input-text" id="cpf" name="cpf">
		</div>
		<div class="form-group col-md-6">
			<label>RG do aluno:</label>
			<input type="text" class="form-control input-text" id="rg" name="rg">
		</div>
		<div class="form-group col-md-12">
			<button type="submit" id="buscar" name="buscar" class="btn btn-success">
				<span class="glyphicon glyphicon-search"></span>
				<strong>Buscar</strong>
			</button>
		</div>
	</form>

	<hr>

	<div class="col-md-12">
		<table class="table table-bordered table-hover table-background">
			<thead>
				<tr class="active">
					<th>Cód.</th>
					<th>Nome</th>
					<th>CPF</th>
					<th>RG</th>
					<th>Data de nascimento</th>
					<th>Telefone</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				foreach($alunos as $aluno): ?>
					<tr>
						<td><?php echo $aluno->id; ?></td>
						<td><?php echo $aluno->nome; ?></td>
						<td><?php echo $aluno->cpf; ?></td>
						<td><?php echo $aluno->rg; ?></td>
						<td><?php echo date_format(new DateTime($aluno->data_nascimento), 'd/m/Y'); ?></td>
						<td><?php echo $aluno->telefone; ?></td>
						<th>
							<a href="/aluno_edi/{{$aluno->id}}" class="btn btn-success">
								<span class="glyphicon glyphicon-refresh"></span>
								<strong>Editar</strong>
							</a>
							<a href="" class="btn btn-danger" data-toggle="modal" data-target="#{{$aluno->id}}">
								<span class="glyphicon glyphicon-remove"></span>
								<strong>Remover</strong>
							</a>
						</th>
					</tr>

					<div class="modal fade" id="{{$aluno->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
				    		<div class="modal-content">
				      			<div class="modal-header">
									<h3 class="modal-title" id="myModalLabel">
    	    							<strong>Excluir o(a) aluno(a) {{$aluno->nome}}</strong>
	        						</h3>
      							</div>
      							<div class="modal-body">
        							<strong>Deseja mesmo excluir o aluno?</strong>
      							</div>
	      						<div class="modal-footer">
      								<a href="/aluno_del/{{$aluno->id}}" class="btn btn-success">
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
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<div class="col-md-6 col-md-offset-5"> 
		<?php echo $alunos->render(); ?>
	</div>

@stop

@section('links')
	<script src="../vendor/js/jqueryMask.js"></script>
	<script>
		jQuery(function($){
            $("#cpf").mask("999.999.999-99");
        });
	</script>
@stop