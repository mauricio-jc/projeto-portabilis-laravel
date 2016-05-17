@extends('principal.principal')

@section('conteudo')

	<h2>Novo usuário</h2>
	<hr>

	<ol class="breadcrumb">
  		<li class="active">Início</li>
  		<li class="active">Cadastro de usuários</li>
	</ol>

	@if(count($errors) > 0)
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
				<ul>
					<li>{{$error}}</li>
				</ul>
			@endforeach
		</div>
	@endif

	@if(old('name') && count($errors) == 0)
		<div class="alert alert-success">
			Usuário cadastrado!
		</div>
	@endif

	<form action="/user_cad/save" method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="form-group col-md-6">
			<label>Nome *</label>
			<input type="text" name="name" class="form-control input-text" value="{{old('name')}}" autofocus>
		</div>
		<div class="form-group col-md-6">
			<label>E-mail *</label>
			<input type="email" name="email" class="form-control input-text" value="{{old('email')}}">
		</div>
		<div class="checkbox col-md-12">
    		<label>
      			<input type="checkbox" name="admin" value="0"> <strong>Administrador</strong>
    		</label>
  		</div>
  		<div class="col-md-12">
  			<button class="btn btn-primary">Salvar</button>
  		</div>
	</form>

@stop