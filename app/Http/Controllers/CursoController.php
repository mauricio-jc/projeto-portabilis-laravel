<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CursoModel;
use Request;
use App\Http\Requests\CursoRequest;

class CursoController extends Controller {

	public function curso_cad(){
		return view('cursos.curso_cad');
	}

	public function save(CursoRequest $request){
		$dados = $request->all();
		//Tira os pontos
		$dados['valor_inscricao'] = preg_replace("/\./", "", $dados['valor_inscricao']);
		//Substitui a vírgula por pontos para poder gravar no banco
		$dados['valor_inscricao'] = preg_replace("/[\,]/", ".", $dados['valor_inscricao']);

		$curso = new CursoModel($dados);
		$curso->save();
		return redirect('/curso_cad')->withInput();

	}

	public function curso_lst(){
		if(isset($_GET['buscar'])){
			$params_curso = Request::all();

			$cursos = CursoModel::orderBy('nome');
			if($params_curso['nome'] <> "") $cursos->where('nome', 'like', '%' . $params_curso['nome'] . '%');
			if($params_curso['periodo'] <> 0) $cursos->where('periodo', '=', $params_curso['periodo']);
			$cursos = $cursos->paginate(20);
			return view('cursos.curso_lst')->with('cursos', $cursos);
		}
		else{
			$cursos = CursoModel::orderBy('nome')->paginate(20);
			return view('cursos.curso_lst')->with('cursos', $cursos);
		}
	}

}
