@extends('principal.principal')

@section('conteudo')

	<h2>Listagem de alunos</h2>
	<hr>

	<ol class="breadcrumb">
  		<li class="active">Início</li>
  		<li class="active">Listagem de alunos</li>
	</ol>

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
			<button type="submit" id="buscar" name="buscar" class="btn btn-success">Buscar</button>
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
							<a href="#" class="btn btn-success">Editar</a>
							<a href="#" class="btn btn-danger">Remover</a>
						</th>
					</tr>
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