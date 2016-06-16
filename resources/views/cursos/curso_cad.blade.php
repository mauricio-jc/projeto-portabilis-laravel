@extends('principal.principal')

@section('conteudo')

	<h2>Cadastro de cursos</h2>
	<hr>

	<ol class="breadcrumb">
  		<li class="active">Início</li>
  		<li class="active">Cadastro</li>
  		<li class="active">Cadastro de cursos</li>
	</ol>

	@if(count($errors) > 0)
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			@foreach($errors->all() as $error)
				<ul>
					<li>{{$error}}</li>
				</ul>
			@endforeach
		</div>
	@endif

	@if(old('nome') && count($errors) == 0)
		<div class="alert alert-success">
			Curso cadastrado.
		</div>
	@endif

	<form action="/curso_cad/save" method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="form-group">
			<label>Nome do curso: *</label>
			<input type="text" name="nome" class="form-control input-text" value="{{old('nome')}}" autofocus>
		</div>
		<div class="form-group">
			<label>Período:</label>
			 <select class="form-control input-text" name="periodo">
			 	<option value="1">Matutino</option>
			 	<option value="2">Vespertino</option>
			 	<option value="3">Noturno</option>
			 </select>
		</div>
		<div class="form-group">
			<label>Valor da inscrição: *</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">
  					R$
  				</span>
  				<input type="text" class="form-control input-text" id="valor_inscricao" name="valor_inscricao" aria-describedby="basic-addon1" value="{{old('valor_inscricao')}}">
			</div>
		</div>
		<button type="submit" class="btn btn-primary">
			<span class="glyphicon glyphicon-floppy-disk"></span>
			<strong>Cadastrar</strong>
		</button>
	</form>

@stop()

@section('links')
	<script src="vendor/js/maskMoney.js"></script>
	<script>
		$(document).ready(function(){
			$("#valor_inscricao").maskMoney({decimal:",", thousands:".", defaultZero: false, allowZero: true});
		});
	</script>
@stop