@extends('principal.principal')

@section('conteudo')

	<h2>Alterar senha</h2>
	<hr>

	<ol class="breadcrumb">
  		<li class="active">Início</li>
  		<li class="active">Alteração de senha</li>
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

	@if(!empty($error_senha))
		<div class="alert alert-danger">
			<ul>
				<li>{{$error_senha}}</li>	
			</ul>
		</div>
	@endif

	@if(count($errors) == 0 && empty($error_senha) && old('password'))
		<div class="alert alert-success">
			Senha alterada!
		</div>
	@endif

	<form action="/senha_alt/update" method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="form-group col-md-12">
      		<label>Usuário</label>
      		<select class="form-control input-text" name="user" disabled>
        		<option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
      		</select>
    	</div>
    	<div class="form-group col-md-6">
    		<label>Nova senha</label>
    		<input type="password" name="password" class="form-control input-text" autofocus>
    	</div>
    	<div class="form-group col-md-6">
    		<label>Confirmar senha</label>
    		<input type="password" name="remember_token" class="form-control input-text">
    	</div>
    	<div class="form-group col-md-12">
    		<button type="submit" class="btn btn-success">Alterar</button>
    	</div>
	</form>

@stop