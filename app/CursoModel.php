<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class CursoModel extends Model {
	protected $table = 'cursos';
	public $timestamps = false;
	protected $fillable = array('nome', 'valor_inscricao', 'periodo');

	public function verifica_vinculo_curso_matricula($curso_id){
		$curso = DB::table('matricula')
					->select('curso_id')
					->where('curso_id', '=', $curso_id)->get();
		return $curso;
	}
}
