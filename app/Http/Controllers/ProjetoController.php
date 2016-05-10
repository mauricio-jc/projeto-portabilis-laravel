<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProjetoController extends Controller {

	public function main(){
		return view('principal.principal');
	}

}
