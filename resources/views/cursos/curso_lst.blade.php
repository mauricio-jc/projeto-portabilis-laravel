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
						@else($curso->periodo == 3) 
							<td>Noturno</td>
						@endif
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
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

@stop