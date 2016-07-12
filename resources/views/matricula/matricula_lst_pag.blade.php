@extends('principal.principal')

@section('conteudo')

	<h2>Pagamento de matrículas</h2>
	<hr>
	
	@if(count($matriculasNaoPagas) == 0)
		<div class="alert alert-info">
			<strong>
				Não há matrículas pendentes!
			</strong>
		</div>
	@else
		<table class="table table-bordered table-hover table-background">
			<thead>
				<tr>
					<th>Código da matrícula</th>
					<th>Aluno</th>
					<th>Curso</th>
					<th>Valor da inscrição</th>
					<th>Situação da mtrícula</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				@foreach($matriculasNaoPagas as $matriculaNaoPaga)
					<tr>
						<td>{{$matriculaNaoPaga->id}}</td>
						<td>{{$matriculaNaoPaga->aluno}}</td>
						<td>{{$matriculaNaoPaga->curso}}</td>
						<td>R$ {{number_format($matriculaNaoPaga->valor_inscricao, 2, ",", ".")}}</td>
						<td>Ativo</td>
						<td>
							<a href="/matricula_pag/{{$matriculaNaoPaga->id}}" class="btn btn-success">
								<span class="glyphicon glyphicon-piggy-bank"></span>
  								<strong>Pagar</strong>
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif

@stop