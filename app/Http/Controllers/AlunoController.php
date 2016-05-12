<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AlunoController extends Controller {

	public function aluno_cad(){
		return view('cadastros.aluno_cad');
	}

}
