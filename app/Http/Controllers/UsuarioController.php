<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use Request;
use Hash;
use Auth;
use App\UsuarioModel;

class UsuarioController extends Controller {

	public function user_cad(){
		return view('usuarios.user_cad');
	}

	public function save(UsuarioRequest $request){
		$params = array('name', 'email', 'password', 'remember_token', 'admin');
		$params['name'] = $request->input('name');
		$params['email'] = $request->input('email');
		$params['password'] = Hash::make(123);
		$params['remember_token'] = Hash::make(123);
		$params['admin'] = $request->input('admin');

		if(isset($params['admin'])) 
			$params['admin'] = 1;
		else
			$params['admin'] = 0;

		$user = new UsuarioModel($params);
		$user->save();

		return redirect('/user_cad')->withInput();
	}

}
