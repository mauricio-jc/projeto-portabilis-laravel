<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class VerificacaoCodSenhaModel extends Model {
	protected $table = 'verificacao_cod_senha';
	public $timestamps = false;
	protected $fillable = array('_token', 'email');
}
