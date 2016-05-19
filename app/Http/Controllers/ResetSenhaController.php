<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResetSenhaRequest;
use Illuminate\Http\Request;
use App\UsuarioModel;
use App\VerificacaoCodSenhaModel;
use DB;
use Mail;

class ResetSenhaController extends Controller {

	public function reset_senha(){
		return view('senha.reset_senha');
	}

	public function send_link(ResetSenhaRequest $request){
		$data = $request->all();
		$email = $request->input('email');
		$assunto = 'Recuperação de senha';
		$nome = 'Laravel';

		$users = UsuarioModel::where('email', '=', $email)->get();
		$userEmail = count($users);

		if($userEmail > 0){
				Mail::send('emails.password_reset', $data, function($message) use ($nome, $email, $assunto){
				$message->from('laravel@email.com', $nome);
				$message->subject($assunto);
				$message->to($email);
			});			

			$insertToken = new VerificacaoCodSenhaModel($data);
			$insertToken->save();
		}

		return redirect('/reset_senha')->withInput();
	}

	public function alt_senha(){
		return view('senha.alt_senha');
	}

	public function update(){
		
	}
}
