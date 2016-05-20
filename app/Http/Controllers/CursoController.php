<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CursoModel;
use Illuminate\Http\Request;
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

}
