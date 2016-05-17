<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use App\UsuarioModel;
use Hash;
use Auth;

class LoginController extends Controller {

	public function login(){
		return view('login.login');
	}

	public function logar(){
		session_start();
		$parametrosLogin = Request::only('email', 'password');

		if(Auth::attempt($parametrosLogin)){
			Auth::user()->name;
			$_SESSION['admin'] = Auth::user()->admin;
			return redirect('/home');
		}
		else{
			session_destroy();	
			return redirect('/')->withInput();
		}
	}

	public function logout(){
		Auth::logout();
		$msg_logout = "Você se desconectou do sistema!";
		return view('login.login')->with('msg_logout', $msg_logout);
	}
}
