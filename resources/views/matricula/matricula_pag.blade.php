@extends('principal.principal')

@section('conteudo')
	
	<h1>Curso: {{$curso->nome}}</h1>
	<h3>Valor a pagar: R$ {{number_format($curso->valor_inscricao, 2, ",", ".")}}</h3>
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

	@if(session()->has('message_error'))
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			O valor informado não pode ser menor que o valor da inscrição.
		</div>
	@endif

	<form action="/matricula_pag/{{$matricula->id}}/pagamento_save" method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="form-group">
			<label>Valor da matrícula: *</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">
  					R$
  				</span>
  				<input type="text" class="form-control input-text" id="valor_inscricao" name="valor_inscricao" aria-describedby="basic-addon1">
			</div>
		</div>
		<button type="submit" class="btn btn-primary"><strong>Efetuar pagamento</strong></button>
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