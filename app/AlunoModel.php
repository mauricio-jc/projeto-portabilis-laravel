<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class AlunoModel extends Model {

	protected $table = 'alunos';
	public $timestamps = false;
	protected $fillable = array('nome', 'cpf', 'rg', 'data_nascimento', 'telefone');

	public function verifica_vinculo_aluno_matricula($id){
		$aluno = DB::select("SELECT alunos.id,
           							alunos.nome,
           							matricula.aluno_id
      						   FROM alunos
						 INNER JOIN matricula ON (alunos.id = matricula.aluno_id)
     						  WHERE alunos.id = $id");
		return $aluno;
	}

}