<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SenhaRequest extends Request {

	public function authorize(){
		return true;
	}

	public function rules(){
		return [
			'password' => 'required|min:6',
			'remember_token' => 'required|min:6'
		];
	}

	public function messages(){
		return [
			'password.required' => 'Preencha o campo senha.',
			'password.min' => 'O campo deve conter pelo menos 6 caracteres.',
			'remember_token.required' => 'Preencha o campo confirmação de senha.',
			'remember_token.min' => 'O campo confirmação de senha deve conter pelo menos 6 caracteres.'
		];
	}
}
