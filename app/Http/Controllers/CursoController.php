<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CursoModel;
use App\MatriculaModel;
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

	public function curso_edi($id){
		$curso = CursoModel::find($id);
		return view('cursos.curso_edi')->with('curso', $curso);
	}

	public function update_curso(CursoRequest $request, $id){
		$params = $request->all();
		$params['valor_inscricao'] = preg_replace("/\./", "", $params['valor_inscricao']);
		$params['valor_inscricao'] = preg_replace("/[\,]/", ".", $params['valor_inscricao']);
		$curso = CursoModel::find($id);
		$curso->nome = $params['nome'];
		$curso->valor_inscricao = $params['valor_inscricao'];
		$curso->periodo = $params['periodo'];
		$curso->save();
		return redirect('/curso_lst');
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

	public function curso_del($id){
		$matriculaCurso = new CursoModel();
		$verificaVinculoMatricula = $matriculaCurso->verifica_vinculo_curso_matricula($id);
		
		if(count($verificaVinculoMatricula) > 0){
			echo "<script language='javascript' type='text/javascript'>alert('Este curso não pode ser excluído pois possui vínculo com alguma matricula.');</script>";
			echo "<script language='javascript' type='text/javascript'>window.location.href='/curso_lst'</script>";
		}
		else{
			$curso = CursoModel::find($id);
			$curso->delete();
			return redirect('/curso_lst');
		}
	}

	public function buscarcurso(){
		$curso = Request::input('term');
		if($curso == " "){
			$cursos = CursoModel::limit(10)->get();
		}
		else{
			$cursos = CursoModel::where("nome", "like", "%$curso%")->limit(10)->get();
		}

		$result = [];
        foreach ($cursos as $c) {
        	if($c->periodo == 1) $c->periodo = "Matutino";
        	if($c->periodo == 2) $c->periodo = "Vespertino";
        	if($c->periodo == 3) $c->periodo = "Noturno";
        	if($c->periodo == 4) $c->periodo = "Integral";
            $result[] = array("value" => $c->id . " - " . $c->nome . " - " . $c->periodo);
        }
		return $result;
	}
}