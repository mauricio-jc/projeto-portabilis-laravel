@extends('principal.principal')

@section('conteudo')
	<h2>Editar Usuário: {{$user->id}}</h2>
	<hr>

	<ol class="breadcrumb">
  		<li class="active">Listagem</li>
  		<li class="active">Edição de usuário</li>
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

	<form action="/user_edi/{{$user->id}}/update_user" method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="form-group col-md-6">
			<label>Nome: *</label>
			<input type="text" class="form-control input-text" id="name" name="name" value="{{$user->name}}">
		</div>
		<div class="form-group col-md-6">
			<label>Email: *</label>
			<input type="email" class="form-control input-text" id="email" name="email" value="{{$user->email}}">
		</div>
		<div class="checkbox col-md-12">
    		<label>
      			<input type="checkbox" name="admin" value="{{$user->admin}}" <?php echo $user->admin == 1 ? 'checked' : '' ?>> <strong>Administrador</strong>
    		</label>
  		</div>
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary">
				<span class="glyphicon glyphicon-refresh"></span>
				<strong>Alterar</strong>
			</button>
			<label>ou</label>
			<a href="/user_lst">
				<strong>Voltar</strong>
			</a>
		</div>
	</form>
@stop