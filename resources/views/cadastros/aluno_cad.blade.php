@extends('principal.principal')

@section('conteudo')

	<h2>Cadastrar novo aluno</h2>
	<hr>

	<form action="#" method="post">
		<div class="form-group col-md-12">
			<label>Nome do aluno *</label>
			<input type="text" class="form-control input-text" name="nome" autofocus>
		</div>
		<div class="form-group col-md-12">
			<label>CPF *</label>
			<input type="text" class="form-control input-text" name="cpf">
		</div>
		<div class="form-group col-md-12">
			<label>RG *</label>
			<input type="text" class="form-control input-text" name="rg">
		</div>
		<div class="form-group col-md-6">
			<label>Data de nascimento *</label>
			<input type="text" class="form-control input-text" name="data_nascimento">
		</div>
		<div class="form-group col-md-6">
			<label>Telefone *</label>
			<input type="text" class="form-control input-text" name="telefone">
		</div>
		<div class="form-group col-md-12">
			<button type="submit" class="btn btn-success" nome="salvar">Salvar</button>
		</div>
	</form>

@stop