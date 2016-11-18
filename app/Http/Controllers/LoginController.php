<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use App\UsuarioModel;
use Hash;
use Auth;
use Session;

class LoginController extends Controller {

	public function login(){
		return view('login.login');
	}

	public function logar(){
		$parametrosLogin = Request::only('email', 'password');

		if($parametrosLogin['email'] != "" && $parametrosLogin['password'] != ""){
			if(Auth::attempt($parametrosLogin)){
				return redirect('/home');
			}
			else{	
				Session::flash("message_error", "Email ou senha inválidos!");
				return redirect('/')->withInput();
			}
		}
		else{
			Session::flash("message_error", "Preencha os campos email e senha.");
			return redirect('/')->withInput();
		}
	}

	public function logout(){
		Auth::logout();
		$msg_logout = "Você se desconectou do sistema!";
		return view('login.login')->with('msg_logout', $msg_logout);
	}
}
