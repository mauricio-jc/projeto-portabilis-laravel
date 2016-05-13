<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioModel extends Model {

	protected $table = 'users';
	public $timestamps = false;
	protected $fillable = array('name', 'email', 'password', 'remember_token', 'admin');

}