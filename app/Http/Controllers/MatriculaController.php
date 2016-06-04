<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AlunoModel;
use App\CursoModel;
use Request;
use App\Http\Requests\MatriculaRequest;
use App\MatriculaModel;
use App\Http\Controllers\DateController;

class MatriculaController extends Controller {

	public function matricula_cad(){
		return view('matricula.matricula_cad');
	}

	public function save(MatriculaRequest $request){
		$params = $request->all();
		$data_mat = new DateController();
		$cod_aluno = explode('-', $params['aluno_id']);
		$cod_curso = explode('-', $params['curso_id']);
		$params['aluno_id'] = $cod_aluno[0];
		$params['curso_id'] = $cod_curso[0];
		$params['data_matricula'] = $data_mat->convert_date_db($params['data_matricula']);
		$matricula = new MatriculaModel();

		$verMatCad = $matricula->verifica_curso_ano_aluno($params['aluno_id'], $params['curso_id'], $params['ano']);

		$getMatCad = count($verMatCad);
		if($getMatCad == 0){
			$matricula->insert_matricula($params['aluno_id'], $params['curso_id'], 
				 						 $params['data_matricula'], $params['ano']);
			return redirect('/matricula_cad')->withInput();
		}else{
			echo "<script language='javascript' type='text/javascript'>alert('Aluno já cadastratdo neste curso, para este período e ano.');</script>";
			echo "<script language='javascript' type='text/javascript'>window.location.href='/matricula_cad'</script>";
		}
	}

	public function matricula_lst(){
		if(isset($_GET['buscar'])){
			$params = Request::all();
			if($params['ano'] == "") $params['ano'] = 0;
			if($params['aluno_id'] == "") $params['aluno_id'] = 0;
			if($params['curso_id'] == "") $params['curso_id'] = 0;
			if(isset($_GET['pago'])) $pago = 1; else $pago = 0;
			$matricula = new MatriculaModel();
			$matriculas = $matricula->listagem_matricula_detalhes($params['ano'], 
																  $params['aluno_id'], 
																  $params['curso_id'],
																  $params['ativo'],
																  $pago);
			return view('matricula.matricula_lst')->with('matriculas', $matriculas);
		}
		else{
			$ano = 0;
			$aluno_id = 0;
			$curso_id = 0;
			$ativo = -1;
			$pago = 0;
			$matricula = new MatriculaModel();
			$matriculas = $matricula->listagem_matricula_detalhes($ano, $aluno_id, $curso_id, $ativo, $pago);
			return view('matricula.matricula_lst')->with('matriculas', $matriculas);
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
            $result[] = array("value" => $c->id . " - " . $c->nome);
        }
		return $result;
	}
}