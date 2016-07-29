@extends('principal.principal')

@section('conteudo')

	<h1>Bem-vindo ao sistema!</h1>
	<hr>
	
	<div class="col-md-4">
		<div class="row">
			<label>Listar usuários</label>
		</div>
		<a href="/user_lst">
			<img src="images/users.png" alt="users" class="img-rounded">
		</a>
	</div>

	<div class="col-md-4">
		<div class="row">
			<label>Listar cursos</label>
		</div>
		<a href="/curso_lst">
			<img src="images/courses.png" alt="users" class="img-rounded">
		</a>
	</div>

	<div class="col-md-4">
		<div class="row">
			<label>Sair do sistema</label>
		</div>
		<a href="#" data-toggle="modal" data-target="#exit">
			<img src="images/exit.png" alt="users" class="img-rounded">
		</a>
	</div>

	<div class="modal fade" id="exit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
					<h3 class="modal-title" id="myModalLabel">
    	    			<strong>Sair</strong>
	        		</h3>
      			</div>
      			<div class="modal-body">
      				<strong>Deseja mesmo sair do sistema?</strong>
				</div>
      			<div class="modal-footer">
      				<a href="/logout" class="btn btn-success">
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
@stop