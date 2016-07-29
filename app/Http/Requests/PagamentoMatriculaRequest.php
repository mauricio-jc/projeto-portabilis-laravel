<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PagamentoMatriculaRequest extends Request {

	public function authorize(){
		return true;
	}

	public function rules(){
		return [
			'valor_inscricao' => 'required'
		];
	}

	public function messages(){
		return [
			'valor_inscricao.required' => 'É necessário informar o valor do pagamento.'
		];
	}

}
