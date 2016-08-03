@extends('principal.principal')

@section('conteudo')

	<h2>Pagamento de matrículas</h2>
	<hr>
		
	<ol class="breadcrumb">
  		<li class="active">Pagamento</li>
  		<li class="active">Pagamento de matrículas</li>
	</ol>

	@if(session()->has('message_success'))
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Pagamento efetuado.
		</div>
	@endif

	@if(count($matriculasNaoPagas) == 0)
		<div class="alert alert-info">
			<strong>
				Não há matrículas pendentes!
			</strong>
		</div>
	@else
		<table class="table table-bordered table-hover table-background">
			<thead>
				<tr>
					<th>Código da matrícula</th>
					<th>Aluno</th>
					<th>Curso</th>
					<th>Valor da inscrição</th>
					<th>Situação da mtrícula</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				@foreach($matriculasNaoPagas as $matriculaNaoPaga)
					<tr>
						<td>{{$matriculaNaoPaga->id}}</td>
						<td>{{$matriculaNaoPaga->aluno}}</td>
						<td>{{$matriculaNaoPaga->curso}}</td>
						<td>R$ {{number_format($matriculaNaoPaga->valor_inscricao, 2, ",", ".")}}</td>
						<td>Ativo</td>
						<td>
							<a href="#" class="btn btn-success" data-toggle="modal" data-target="#pagamento_save">
								<span class="glyphicon glyphicon-piggy-bank"></span>
  								<strong>Pagar</strong>
							</a>
						</td>
					</tr>

					<div class="modal fade" id="pagamento_save" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
				    		<div class="modal-content">
				      			<div class="modal-header">
									<h3 class="modal-title" id="myModalLabel">
    	    							<strong>Efetuar pagamento</strong>
	        						</h3>
      							</div>
      							<div class="modal-body">
        							<strong>Curso: </strong>{{$matriculaNaoPaga->curso}} <br>
        							<strong>Valor: </strong>R$ {{number_format($matriculaNaoPaga->valor_inscricao, 2, ",", ".")}} <br>
      							</div>
	      						<div class="modal-footer">
      								<a href="/matricula_pag/{{$matriculaNaoPaga->id}}/pagamento_save" class="btn btn-success">
      									<span class="glyphicon glyphicon-ok"></span>
        								<strong>Sim</strong>
        							</a>
        							<button type="button" class="btn btn-danger" data-dismiss="modal">
        								<span class="glyphicon glyphicon-remove"></span>
        								<strong>Não</strong>
    	    						</button>
	      						</div>
    						</div>
  						</div>
					</div>
				@endforeach
			</tbody>
		</table>
	@endif
	<div class="col-md-6 col-md-offset-5"> 
		<?php echo $matriculasNaoPagas->render(); ?>
	</div>
@stop