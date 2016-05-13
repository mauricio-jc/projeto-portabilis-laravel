@extends('principal.principal')

@section('conteudo')

	<h2>Listagem de alunos</h2>
	<hr>
	<table class="table table-bordered table-hover">
		<thead>
			<tr class="active">
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
			foreach($alunos as $aluno):
				$aluno->data_nascimento = date('d/m/Y',strtotime($aluno->telefone)); ?>
				<tr>
					<td><?php echo $aluno->nome; ?></td>
					<td><?php echo $aluno->cpf; ?></td>
					<td><?php echo $aluno->rg; ?></td>
					<td><?php echo $aluno->data_nascimento; ?></td>
					<td><?php echo $aluno->telefone; ?></td>
					<th>
						<a href="#" class="btn btn-success">Editar</a>
						<a href="#" class="btn btn-danger">Remover</a>
					</th>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<div class="col-md-12 col-md-offset-5"> 
		<?php echo $alunos->render(); ?>
	</div>

@stop