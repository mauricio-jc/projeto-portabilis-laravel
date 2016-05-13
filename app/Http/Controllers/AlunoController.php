<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use App\Http\Requests\AlunoRequest;
use App\Http\Controllers\DateController;
use App\AlunoModel;

class AlunoController extends Controller {

	public function aluno_cad(){
		return view('alunos.aluno_cad');
	}

	public function save(AlunoRequest $request){
		$data = new DateController();
		$paramsAluno = $request->all();
		//Converte a data para o formato do banco
		$paramsAluno['data_nascimento'] = $data->convert_date_db($paramsAluno['data_nascimento']);
		$alunos = new AlunoModel($paramsAluno);
		$alunos->save();

		return redirect('/aluno_cad')->withInput();
	}

	public function aluno_lst(){
		$data = new DateController();
		$alunos = AlunoModel::orderBy('nome')->get();
		$alunos = AlunoModel::paginate(10);
		return view('alunos.aluno_lst')->with('alunos', $alunos);
	}
}
