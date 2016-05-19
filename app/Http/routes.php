<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/logout', 'LoginController@logout');

Route::get('/', 'LoginController@login');

Route::get('/home', 'ProjetoController@main');

Route::post('/logar', 'LoginController@logar');

Route::get('/reset_senha', 'ResetSenhaController@reset_senha');

Route::post('/send_link', 'ResetSenhaController@send_link');

Route::get('/alt_senha', 'ResetSenhaController@alt_senha');

Route::post('/alt_senha/update', 'ResetSenhaController@update');

Route::get('/aluno_cad', 'AlunoController@aluno_cad');

Route::post('/aluno_cad/save', 'AlunoController@save');

Route::get('/aluno_lst', 'AlunoController@aluno_lst');

Route::get('/user_cad', 'UsuarioController@user_cad');

Route::post('/user_cad/save', 'UsuarioController@save');

Route::get('/senha_alt', 'UsuarioController@senha_alt');

Route::post('/senha_alt/update', 'UsuarioController@update');

/*Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);*/
