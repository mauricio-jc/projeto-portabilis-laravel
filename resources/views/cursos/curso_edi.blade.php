@extends('principal.principal')

@section('conteudo')

	<h2>Editar curso: {{$curso->id}}</h2>
	<hr>

	<ol class="breadcrumb">
  		<li class="active">Listagem</li>
  		<li class="active">Edição de curso</li>
	</ol>

	@if(count($errors) > 0)
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<form action="/curso_edi/{{$curso->id}}/update_curso" method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="form-group">
			<label>Curso: *</label>
			<input type="text" class="form-control input-text" id="nome" name="nome" value="{{$curso->nome}}">
		</div>
		<div class="form-group">
			<label>Valor da inscrição: *</label>
			<input type="text" class="form-control input-text" id="valor_inscricao" name="valor_inscricao" value="{{number_format($curso->valor_inscricao, 2, ",", ".")}}">
		</div>
		<div class="form-group">
			<label>Período: *</label>
			<select id="periodo" name="periodo" class="form-control input-text">
				@if($curso->periodo == 1) 
					<option value="{{$curso->periodo}}" selected>Matutino</option> 
					<option value="2">Vespertino</option>
					<option value="3">Noturno</option>
					<option value="4">Integral</option>
				@endif
				@if($curso->periodo == 2)
					<option value="1">Matutino</option>
					<option value="{{$curso->periodo}}" selected>Vespertino</option>
					<option value="3">Noturno</option>
					<option value="4">Integral</option>
				@endif
				@if($curso->periodo == 3)
					<option value="1">Matutino</option>
					<option value="2">Vespertino</option>
					<option value="{{$curso->periodo}}" selected>Noturno</option>
					<option value="4">Integral</option>
				@endif
				@if($curso->periodo == 4)
					<option value="1">Matutino</option>
					<option value="2">Vespertino</option>
					<option value="3">Noturno</option>
					<option value="{{$curso->periodo}}" selected>Integral</option>
				@endif
			</select>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success">
				<span class="glyphicon glyphicon-refresh"></span>
				<strong>Editar</strong>
			</button>
			<a href="/curso_lst" class="btn btn-inverse">
				<span class="glyphicon glyphicon-arrow-left"></span>
				<strong>Voltar</strong>
			</a>
		</div>
	</form>

@stop

@section('links')
	<script src="../vendor/js/maskMoney.js"></script>
	<script>
		$(document).ready(function(){
			$("#valor_inscricao").maskMoney({decimal:",", thousands:".", defaultZero: false, allowZero: true});
		});
	</script>
@stop