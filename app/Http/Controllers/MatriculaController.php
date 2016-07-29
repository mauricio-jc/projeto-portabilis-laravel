<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AlunoModel;
use App\CursoModel;
use Request;
use App\Http\Requests\MatriculaRequest;
use App\Http\Requests\PagamentoMatriculaRequest;
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
			$matricula->insert_matricula($params['aluno_id'], 
										 $params['curso_id'], 
				 						 $params['data_matricula'], 
				 						 $params['ano']);
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
			if($params['aluno_id'] == ""){
				$aluno_id = 0;
			}
			else{
				$arrAluno = explode("-", $params['aluno_id']);
				$aluno_id = $arrAluno[0];
			}
			if($params['curso_id'] == ""){
				$curso_id = 0;
			}
			else{
				$arrCurso = explode("-", $params['curso_id']);
				$curso_id = $arrCurso[0];
			}
			if(isset($_GET['pago'])) $pago = 1; else $pago = 0;
			$matricula = new MatriculaModel();
			$matriculas = $matricula->listagem_matricula_detalhes($params['ano'], 
																  $aluno_id, 
																  $curso_id,
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
			$matriculas = $matricula->listagem_matricula_detalhes($ano, 
																  $aluno_id, 
																  $curso_id, 
																  $ativo, 
																  $pago);
			return view('matricula.matricula_lst')->with('matriculas', $matriculas);
		}
	}

	public function matricula_desat($id){
		$matricula = MatriculaModel::find($id);
		$matricula->ativo = 0;
		$matricula->save();
		return redirect('/matricula_lst')->withInput();
	}

	public function matricula_ati($id){
		$matricula = MatriculaModel::find($id);
		$matricula->ativo = 1;
		$matricula->save();
		return redirect('/matricula_lst')->withInput();	
	}

	public function matricula_del($id){
		$matricula =  MatriculaModel::find($id);
		$matricula->delete();

		return redirect('/matricula_lst');
	}

	public function matricula_lst_pag(){
		$matriculas = new MatriculaModel();
		$matriculasNaoPagas = $matriculas->matriculas_nao_pagas();
		return view('matricula.matricula_lst_pag')->with('matriculasNaoPagas', $matriculasNaoPagas);
	}

	public function matricula_pag($id){
		$matricula = MatriculaModel::find($id);
		$id = $matricula->curso_id;
		$curso = CursoModel::find($id);
		
		return view('matricula.matricula_pag')->with(array('curso' => $curso, 'matricula' => $matricula));
	}

	public function pagamento_save(PagamentoMatriculaRequest $request, $id){
		$valorInscricaoInformado = $request->all();
		$valorInscricaoInformado['valor_inscricao'] = preg_replace("/\./", "", $valorInscricaoInformado['valor_inscricao']);
		$valorInscricaoInformado['valor_inscricao'] = preg_replace("/[\,]/", ".", $valorInscricaoInformado['valor_inscricao']);

		$matricula = MatriculaModel::find($id);
		$valorCurso = CursoModel::find($matricula->curso_id);

		if($valorInscricaoInformado['valor_inscricao'] < $valorCurso->valor_inscricao){
			return redirect()->back()->with('message_error', [1]);;
		}
		else{
			$matricula->pago = 1;
			$matricula->save();

			return redirect('/matricula_lst_pag');
		}
	}
}