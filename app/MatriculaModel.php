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
		$matricula = DB::select("SELECT *
								   FROM matricula
								  WHERE aluno_id = $aluno_id
  									AND curso_id = $curso_id
  									AND ano = $ano");
		return $matricula;
	}

	public function listagem_matricula_detalhes($ano, $aluno_id, $curso_id, $ativo, $pago){
		$matricula = DB::select("SELECT matricula.id AS id,
       									alunos.nome AS nome_aluno,
       									cursos.nome AS curso_nome,
       									matricula.ano,
       									(case WHEN matricula.ativo = 0 THEN 'Inativo'
	     									  WHEN matricula.ativo = 1 THEN 'Ativo'
										END) AS situacao_matricula,
       									(CASE WHEN matricula.pago = 0 THEN 'Não'
             								  WHEN matricula.pago = 1 THEN 'Sim'
        								END) AS pago,
       									(CASE WHEN cursos.periodo = 1 THEN 'Matutino'
             								  WHEN cursos.periodo = 2 THEN 'Vespertino'
             								  WHEN cursos.periodo = 3 THEN 'Noturno'
             								  WHEN cursos.periodo = 4 THEN 'Integral'
        								END) AS periodo,
       									alunos.telefone,
       									alunos.data_nascimento
								   FROM matricula
							 INNER JOIN alunos ON (matricula.aluno_id = alunos.id)
							 INNER JOIN cursos ON (matricula.curso_id = cursos.id)
								  WHERE (CASE WHEN $ano = 0 THEN true ELSE matricula.ano = $ano END) AND
      									(CASE WHEN $aluno_id = 0 THEN true ELSE alunos.id = $aluno_id END) AND
      									(CASE WHEN $curso_id = 0 THEN true ELSE cursos.id = $curso_id END) AND
      									(CASE WHEN $ativo = -1 THEN true ELSE matricula.ativo = $ativo END) AND
      									(CASE WHEN $pago = 0 THEN true ELSE matricula.pago = $pago END)
      						   ORDER BY id");
		return $matricula;
	}
}
