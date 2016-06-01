@extends('principal.principal')

@section('css')
	<link rel="stylesheet" type="text/css" href="vendor/css/jquery-ui.min.css">
@stop

@section('conteudo')

	<h2>Nova matricula</h2>
	<hr>

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

	@if(count($errors) == 0 && old('aluno_id'))
		<div class="alert alert-success">
			Matricula cadastrada!
		</div>
	@endif

	<form action="/matricula_cad/save" method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="form-group col-md-12">
			<label>Aluno: *</label>
			<input type="text" id="aluno_id" name="aluno_id" class="form-control input-text" placeholder="Campo auto-complete">
		</div>
		<div class="form-group col-md-12">
			<label>Curso: *</label>
			<input type="text" id="curso_id" name="curso_id" class="form-control input-text" placeholder="Campo auto-complete">
		</div>
		<div class="form-group col-md-6">
			<label>Data da matrícula: *</label>
			<input type="text" id="data_matricula" name="data_matricula" class="form-control input-text">
		</div>
		<div class="form-group col-md-6">
			<label>Ano da matrícula: *</label>
			<input type="text" id="ano" name="ano" class="form-control input-text">
		</div>
		<div class="form-group col-md-6">
			<button type="submit" class="btn btn-success">
				<span class="glyphicon glyphicon-plus"></span>
				Cadastrar
			</button>
		</div>
	</form>

@stop

@section('links')
	<script src="../vendor/js/jqueryMask.js"></script>
	<script src="vendor/js/jquery-ui.min.js"></script>
	<script>
		$(function (){
			$('#aluno_id').autocomplete({
            	source : 'buscaraluno'
			});
		});

		$(function (){
			$('#curso_id').autocomplete({
            	source : 'buscarcurso'
			});
		});

		jQuery(function($){
            $("#data_matricula").mask("99/99/9999");
            $("#ano").mask("9999");
        });
	</script>
@stop