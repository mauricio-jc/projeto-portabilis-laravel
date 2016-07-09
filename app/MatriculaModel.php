<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class MatriculaModel extends Model {
	protected $table = 'matricula';
	public $timestamps = false;
	protected $fillable = array('aluno_id', 'curso_id', 'data_matricula', 'ano', 'ativo', 'pago');

	public function insert_matricula($aluno_id, $curso_id, $data_matricula, $ano){
		DB::table('matricula')->insert(['aluno_id' 		 => $aluno_id, 
			                   			'curso_id' 		 => $curso_id,
			                   			'data_matricula' => $data_matricula,
			                   			'ano' 			 => $ano,
			                   			'ativo' 		 => 1,
			                   			'pago' 			 => 0]);
		return true;
	}

	public function verifica_curso_ano_aluno($aluno_id, $curso_id, $ano){
		$matricula = DB::table('matricula')
						->select('*')
						->where('aluno_id', '=', $aluno_id)
						->where('curso_id', '=', $curso_id)
						->where('ano', '=', $ano)->get();
		return $matricula;
	}

	public function listagem_matricula_detalhes($ano, $aluno_id, $curso_id, $ativo, $pago){
		$matricula = DB::table("matricula")
		 			->select("matricula.id AS id", 
		 					 "alunos.nome AS nome_aluno", 
		 					 "cursos.nome AS curso_nome",
		 					 "matricula.ano",
		 					 "matricula.ativo",
							 "matricula.pago",
        					 "cursos.periodo",
        					 "alunos.telefone",
        					 "alunos.data_nascimento")
		 			->join("alunos", "matricula.aluno_id", "=", "alunos.id")
		 			->join("cursos", "matricula.curso_id", "=", "cursos.id");
		 			if($ano <> 0) $matricula->where("matricula.ano", "=", $ano);
		 			if($aluno_id <> 0) $matricula->where("alunos.id", "=", $aluno_id);
		 			if($curso_id <> 0) $matricula->where("cursos.id", "=", $curso_id);
		 			if($ativo <> -1) $matricula->where("matricula.ativo", "=", $ativo);
		 			if($pago <> 0) $matricula->where("matricula.pago", "=", $pago);
	       									
		 			$matricula = $matricula->orderBy('id')->paginate(20);

		return $matricula;
	}
}
