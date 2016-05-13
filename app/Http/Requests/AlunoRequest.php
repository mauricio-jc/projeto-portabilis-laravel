<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AlunoRequest extends Request {

	public function authorize(){
		return true;
	}

	public function rules(){
		return [
			'nome' => 'required',
			'cpf' => 'required|max:15',
			'rg' => 'required|max:15',
			'data_nascimento' => 'required',
			'telefone' => 'required'
		];
	}

	public function messages(){
		return [
			'nome.required' => 'Preencha o campo nome',
			'cpf.required' => 'Preencha o campo cpf',
			'cpf.max' => 'Campo cpf, máximo 15 caracteres',
			'rg.required' => 'Preencha o campo rg',
			'rg.max' => 'Campo rg, máximo 15 caracteres',
			'data_nascimento.required' => 'Preencha o campo data de nascimento',
			'telefone.required' => 'Preencha o campo telefone'
		];
	}
}
