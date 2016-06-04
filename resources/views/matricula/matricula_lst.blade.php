@extends('principal.principal')

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
				<option value="1">Ativos</option>
				<option value="0">Inativos</option>
				<option value="-1">Todos</option>
			</select>
		</div>
		<div class="checkbox col-md-5">
    		<label class="label_pago"><input type="checkbox" class="pago" id="pago" name="pago" value="0"> <strong>Pago</strong></label>
  		</div>
  		<div class="form-group col-md-12">
			<button type="submit" id="buscar" name="buscar" class="btn btn-success">
				<span class="glyphicon glyphicon-search"></span>
				Buscar
			</button>
		</div>
	</form>

	<div class="col-md-12">
		<table class="table table-bordered table-hover table-background">
			<thead>
				<tr>
					<td>Aluno</td>
					<td>Curso</td>
					<td>Ano</td>
					<td>Situação</td>
					<td>Pago</td>
					<td>Ações</td>
				</tr>
			</thead>
			<tbody>
				@foreach($matriculas as $matricula)
					<tr>
						<td>{{$matricula->nome_aluno}}</td>
						<td>{{$matricula->curso_nome}}</td>
						<td>{{$matricula->ano}}</td>
						<td>{{$matricula->situacao_matricula}}</td>
						<td>{{$matricula->pago}}</td>
						<td>
							@if($matricula->situacao_matricula == 'Ativo')
								<a href="#"><span class="glyphicon glyphicon-remove" title="Inativar"></span></a>
							@else
								<a href="#"><span class="glyphicon glyphicon-ok" title="Ativar"></span></a>
							@endif
							/
							<a href="#"><span class="glyphicon glyphicon-search" title="Visualizar"></span></a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

@stop