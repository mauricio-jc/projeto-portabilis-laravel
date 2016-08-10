@extends('principal.principal')

@section('conteudo')

	<h2>Editar aluno: {{$aluno->id}}</h2>
	<hr>

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

	<form action="/aluno_edi/{{$aluno->id}}/update_aluno" method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="form-group col-md-12">
			<label>Nome do aluno: *</label>
			<input type="text" class="form-control input-text" name="nome" value="{{$aluno->nome}}" autofocus>
		</div>
		<div class="form-group col-md-12">
			<label>CPF: *</label>
			<input type="text" class="form-control input-text" id="cpf" name="cpf" value="{{$aluno->cpf}}" onchange="validaCpf(this.value);">
		</div>
		<div class="form-group col-md-12">
			<label>RG: *</label>
			<input type="text" class="form-control input-text" value="{{$aluno->rg}}" name="rg" maxlength="10">
		</div>
		<div class="form-group col-md-6">
			<label>Data de nascimento: *</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">
  					<span class="glyphicon glyphicon-calendar"></span>
  				</span>
  				<input type="text" class="form-control input-text" id="data_nascimento" name="data_nascimento" aria-describedby="basic-addon1" value="{{$aluno->data_nascimento}}">
			</div>
		</div>
		<div class="form-group col-md-6">
			<label>Telefone: *</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">
  					<span class="glyphicon glyphicon-earphone"></span>
  				</span>
  				<input type="text" class="form-control input-text" id="telefone" name="telefone" aria-describedby="basic-addon1" value="{{$aluno->telefone}}">
			</div>
		</div>
		<div class="form-group col-md-12">
			<button type="submit" class="btn btn-success" nome="salvar">
				<span class="glyphicon glyphicon-refresh"></span>
				<strong>Editar</strong>
			</button>
			<label>ou</label>
			<a href="/aluno_lst">
				<strong>Voltar</strong>
			</a>
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