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

	public function aluno_edi($id){
		$data = new DateController();
		$aluno = AlunoModel::find($id);
		$aluno->data_nascimento = $data->convert_date_screen($aluno->data_nascimento);
		return view('alunos.aluno_edi')->with('aluno', $aluno);
	}

	public function update_aluno(AlunoRequest $request, $id){
		$params = $request->all();
		$aluno = AlunoModel::find($id);
		$data = new DateController();
		$aluno->nome = $params['nome'];
		$aluno->cpf = $params['cpf'];
		$aluno->rg = $params['rg'];
		$aluno->telefone = $params['telefone'];
		$aluno->data_nascimento = $data->convert_date_db($params['data_nascimento']);
		$aluno->save();
		return redirect('/aluno_lst');
	}

	public function aluno_lst(){
		if(isset($_GET['buscar'])){
			$params_aluno = Request::all();
			$alunos = AlunoModel::orderBy('id');
			if($params_aluno['id']   <> "") $alunos->where('id', '=', $params_aluno['id']);
			if($params_aluno['nome'] <> "") $alunos->where('nome', 'like', '%' . $params_aluno['nome'] . '%');
			if($params_aluno['cpf']  <> "") $alunos->where('cpf', '=', $params_aluno['cpf']);
			if($params_aluno['rg']   <> "") $alunos->where('rg', '=', $params_aluno['rg']);

			$alunos = $alunos->paginate(20);
			return view('alunos.aluno_lst')->with('alunos', $alunos);
		}
		else{
			$alunos = AlunoModel::orderBy('id')->paginate(20);
			return view('alunos.aluno_lst')->with('alunos', $alunos);
		}
	}

	public function aluno_del($id){
		$matriculaAluno = new AlunoModel();
		$verficaVinculoAlunoMatricula = $matriculaAluno->verifica_vinculo_aluno_matricula($id);
		if(count($verficaVinculoAlunoMatricula) > 0){
			return redirect()->back()->with('message_error', [1]);
		}
		else{
			$aluno = AlunoModel::find($id);
			$aluno->delete();
			return redirect('/aluno_lst');
		}
	}

	public function buscaraluno(){
		$aluno = Request::input('term');
		if($aluno == " "){
			$alunos = AlunoModel::limit(10)->get();
		}
		else{
			$alunos = AlunoModel::where("nome", "like", "%$aluno%")->limit(10)->get();
		}

		$result = [];
        foreach ($alunos as $a) {
            $result[] = array("value" => $a->id . " - " . $a->nome);
        }
		return $result;
	}
}