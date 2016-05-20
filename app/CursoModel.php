<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CursoModel extends Model {
	protected $table = 'cursos';
	public $timestamps = false;
	protected $fillable = array('nome', 'valor_inscricao', 'periodo');
}
