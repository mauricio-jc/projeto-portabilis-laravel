@extends('principal.principal')

@section('conteudo')

	<h2>Cadastrar novo aluno</h2>
	<hr>

	<ol class="breadcrumb">
  		<li class="active">Início</li>
  		<li class="active">Cadastro</li>
  		<li class="active">Cadastro de alunos</li>
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
		<div class="alert alert-info alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Aluno {{old('nome')}} cadastrado!
		</div>
	@endif

	<form action="/aluno_cad/save" method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="form-group col-md-12">
			<label>Nome do aluno: *</label>
			<input type="text" class="form-control input-text" name="nome" value="{{old('nome')}}" autofocus>
		</div>
		<div class="form-group col-md-12">
			<label>CPF: *</label>
			<input type="text" class="form-control input-text" id="cpf" name="cpf" value="{{old('cpf')}}" onchange="validaCpf(this.value);">
		</div>
		<div class="form-group col-md-12">
			<label>RG: *</label>
			<input type="text" class="form-control input-text" value="{{old('rg')}}" name="rg">
		</div>
		<div class="form-group col-md-6">
			<label>Data de nascimento: *</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">
  					<span class="glyphicon glyphicon-calendar"></span>
  				</span>
  				<input type="text" class="form-control input-text" id="data_nascimento" name="data_nascimento" aria-describedby="basic-addon1" value="{{old('data_nascimento')}}">
			</div>
		</div>
		<div class="form-group col-md-6">
			<label>Telefone: *</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">
  					<span class="glyphicon glyphicon-earphone"></span>
  				</span>
  				<input type="text" class="form-control input-text" id="telefone" name="telefone" aria-describedby="basic-addon1" value="{{old('telefone')}}">
			</div>
		</div>
		<div class="form-group col-md-12">
			<button type="submit" class="btn btn-success" nome="salvar">
				<span class="glyphicon glyphicon-floppy-disk"></span>
				<strong>Salvar</strong>
			</button>
		</div>
	</form>

@stop

@section('links')
	<script src="../vendor/js/jqueryMask.js"></script>
	<script src="../vendor/js/validaCpf.js"></script>
	<script type="text/javascript">
		jQuery(function($){
            $("#cpf").mask("999.999.999-99");
            $("#data_nascimento").mask("99/99/9999");
            $("#telefone").mask("(99)9999-9999");
        });
	</script>
@stop