<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AltSenhaRequest extends Request {

	public function authorize(){
		return true;
	}

	public function rules(){
		return [
			'codigo' => 'required',
			'email' => 'required|email',
			'password' => 'required|min:6',
			'remember_token' => 'required|min:6'
		];
	}

	public function messages(){
		return [
			'codigo.required' => 'Preencha o campo código.',
			'email.required' => 'Preencha o campo email.',
			'email.email' => 'Informe um email válido.',
			'password.required' => 'Preencha o campo senha.',
			'password.min' => 'O campo senha deve ter pelo menos 6 caracteres.',
			'remember_token.required' => 'Preencha o campo confirmação de senha.',
			'remember_token.min' => 'O campo confirmação de senha deve ter pelo menos 6 caracteres.'
		];
	}
}
