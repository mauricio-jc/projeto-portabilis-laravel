<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class MatriculaRequest extends Request {

	public function authorize(){
		return true;
	}

	public function rules(){
		return [
			'aluno_id' => 'required',
			'curso_id' => 'required',
			'data_matricula' => 'required',
			'ano' => 'required'
		];
	}

	public function messages(){
		return [
			'aluno_id.required' => 'Preencha o campo aluno.',
			'curso_id.required' => 'Preencha o campo curso.',
			'data_matricula.required' => 'Preencha o campo data da matrícla.',
			'ano.required' => 'Preencha o campo ano.'
		];
	}
}
