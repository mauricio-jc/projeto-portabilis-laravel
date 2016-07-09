<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class AlunoModel extends Model {

	protected $table = 'alunos';
	public $timestamps = false;
	protected $fillable = array('nome', 'cpf', 'rg', 'data_nascimento', 'telefone');

	public function verifica_vinculo_aluno_matricula($id){
		$aluno = DB::table('alunos')
					->select('alunos.id', 'alunos.nome', 'matricula.aluno_id')
					->join('matricula', 'alunos.id', '=', 'matricula.aluno_id')
					->where('alunos.id', '=', $id)->get();
		return $aluno;
	}
}