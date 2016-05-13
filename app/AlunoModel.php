<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AlunoModel extends Model {

	protected $table = 'alunos';
	public $timestamps = false;
	protected $fillable = array('nome', 'cpf', 'rg', 'data_nascimento', 'telefone');

}
