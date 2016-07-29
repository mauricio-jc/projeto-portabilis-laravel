<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResetSenhaRequest;
use App\Http\Requests\AltSenhaRequest;
use Illuminate\Http\Request;
use App\UsuarioModel;
use App\VerificacaoCodSenhaModel;
use DB;
use Mail;
use Hash;

class ResetSenhaController extends Controller {

	public function reset_senha(){
		return view('senha.reset_senha');
	}

	public function send_link(ResetSenhaRequest $request){
		$data = $request->all();
		$data['_token'] = md5(uniqid(rand(), true));
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

	public function update_senha(AltSenhaRequest $request){
		$codigo = $request->input('codigo');
		$email = $request->input('email');
		$password = $request->input('password');
		$remember_token = $request->input('remember_token');
		$msg_error = '';
		$msg_success = '';

		$verificar_cod = VerificacaoCodSenhaModel::where('_token', '=', $codigo)->where('email', '=', $email)->get();
		$arrCodVerificar = count($verificar_cod);

		if($arrCodVerificar == 0){
			$msg_error = 'Código ou email não válidos.';
			return view('senha.alt_senha')->with('msg_error', $msg_error);
		}
		elseif($password <> $remember_token){
			$msg_error = 'As senhas não coincidem.';
			return view('senha.alt_senha')->with('msg_error', $msg_error);	
		}
		else{
			$users = UsuarioModel::where('email', '=', $email)->get();

			foreach ($users as $user) {
				$user->password = Hash::make($password);
				$user->remember_token = Hash::make($remember_token);

				$user->save();
			}

			DB::delete('DELETE FROM verificacao_cod_senha');

			$msg_success = 'Senha alterada com sucesso.';

			return view('login.login')->with('msg_success', $msg_success);
		}
	}
}