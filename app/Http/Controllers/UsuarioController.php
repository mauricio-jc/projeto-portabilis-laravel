<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use App\Http\Requests\UsuarioRequestEdicao;
use App\Http\Requests\SenhaRequest;
use Request;
use Hash;
use Auth;
use App\UsuarioModel;

class UsuarioController extends Controller {

	public function user_cad(){
		return view('usuarios.user_cad');
	}

	public function save(UsuarioRequest $request){
		session_start();
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

	public function senha_alt(){
		return view('usuarios.senha_alt');
	}

	public function update(SenhaRequest $request){
		$params = array('password', 'remember_token');
		$params['password'] = $request->input('password');
		$params['remember_token'] = $request->input('remember_token');

		if($params['password'] <> $params['remember_token']){
			$error_senha = "As senhas não coincidem.";
			return view('usuarios.senha_alt')->with('error_senha', $error_senha);
		}
		else{
			$user = UsuarioModel::find(Auth::user()->id);
			$user->password = Hash::make($params['password']);
			$user->remember_token = Hash::make($params['remember_token']);
			$user->save();
			return redirect('/senha_alt')->withInput();
		}
	}

	public function user_lst(){
		if(isset($_GET['buscar'])){
			$params = Request::all();
			$usuarios = UsuarioModel::orderBy('id');
			if($params['id'] <> "") $usuarios->where('id', '=', $params['id']);
			if($params['name'] <> "") $usuarios->where('name', 'like', '%' . $params['name'] . '%');
			if($params['email'] <> "") $usuarios->where('email', '=', $params['email']);
			if($params['admin'] <> "") $usuarios->where('admin', '=', $params['admin']);
			$usuarios = $usuarios->paginate(20);
			return view('usuarios.user_lst')->with('usuarios', $usuarios);
		}else{
			$usuarios = UsuarioModel::orderBY('id')->paginate(20);
			return view('usuarios.user_lst')->with('usuarios', $usuarios);
		}
	}

	public function user_edi($id){
		$user = UsuarioModel::find($id);
		return view('usuarios.user_edi')->with('user', $user);
	}

	public function update_user(UsuarioRequestEdicao $request, $id){
		$params = $request->all();
		$user = UsuarioModel::find($id);
		$user->name = $params['name'];
		$user->email = $params['email'];

		if(isset($params['admin'])) 
			$user->admin = 1;
		else
			$user->admin = 0;

		$user->save();
		return redirect('/user_lst');
	}

	public function user_del($id){
		if(Auth::user()->id == $id){
			$user = UsuarioModel::find($id);
			$user->delete();
			Auth::logout();
			return redirect('/');
		}
		else{
			$user = UsuarioModel::find($id);
			$user->delete();

			return redirect('/user_lst');
		}
	}
}