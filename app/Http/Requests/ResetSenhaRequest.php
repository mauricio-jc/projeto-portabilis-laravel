<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ResetSenhaRequest extends Request {

	public function authorize(){
		return true;
	}

	public function rules(){
		return [
			'email' => 'required|email'
		];
	}

	public function messages(){
		return [
			'email.required' => 'Preencha o campo email.',
			'email.email' => 'Digite um email válido.'
		];
	}

}
