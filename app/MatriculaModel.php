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
}
