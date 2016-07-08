@extends('principal.principal')

@section('conteudo')

	<h2>Listagem de cursos</h2>
	<hr>

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
		<table class="table table-bordered table-hover table-background">
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
							<a href="/curso_del/{{$curso->id}}" class="btn btn-danger" onclick="return confirm('Deseja mesmo excluir este curso?');">
								<span class="glyphicon glyphicon-remove"></span>
								<strong>Excluir</strong>
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<div class="col-md-6 col-md-offset-5"> 
		<?php echo $cursos->render(); ?>
	</div>

@stop