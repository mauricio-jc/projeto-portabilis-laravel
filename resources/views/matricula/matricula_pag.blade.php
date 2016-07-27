@extends('principal.principal')

@section('conteudo')

	<h3>Valor a pagar: R$ {{number_format($valorMatricula->valor_inscricao, 2, ",", ".")}}</h3>
	<hr>

@stop