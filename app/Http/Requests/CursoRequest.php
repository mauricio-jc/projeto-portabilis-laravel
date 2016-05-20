<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CursoRequest extends Request {

	public function authorize(){
		return true;
	}

	public function rules(){
		return [
			'nome' => 'required',
			'valor_inscricao' => 'required'
		];
	}

	public function messages(){
		return [
			'nome.required' => 'Preencha o campo nome do curso',
			'valor_inscricao.required' => 'Informe o valor da inscrição'
		];
	}
}
