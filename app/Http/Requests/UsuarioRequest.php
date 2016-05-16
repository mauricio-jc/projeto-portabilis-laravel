<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsuarioRequest extends Request {

	public function authorize(){
		return true;
	}

	public function rules(){
		return [
			'name' => 'required',
			'email' => 'required|email|unique:users'
		];
	}

	public function messages(){
		return [
			'name.required' => 'Preencha o campo nome.',
			'email.required' => 'Preencha o campo email.',
			'email.email' => 'Informe um email válido.',
			'email.unique' => 'Email já cadastrado'
		];
	}

}
