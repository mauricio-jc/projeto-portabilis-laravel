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

Route::post('/update_senha', 'ResetSenhaController@update_senha');

Route::get('/aluno_cad', 'AlunoController@aluno_cad');

Route::post('/aluno_cad/save', 'AlunoController@save');

Route::get('/aluno_lst', 'AlunoController@aluno_lst');

Route::get('/curso_cad', 'CursoController@curso_cad');

Route::post('/curso_cad/save', 'CursoController@save');

Route::get('/curso_lst', 'CursoController@curso_lst');

Route::get('/matricula_cad', 'MatriculaController@matricula_cad');

Route::get('buscaraluno', 'AlunoController@buscaraluno');

Route::get('buscarcurso', 'CursoController@buscarcurso');

Route::post('/matricula_cad/save', 'MatriculaController@save');

Route::get('/matricula_lst', 'MatriculaController@matricula_lst');

Route::get('/user_cad', 'UsuarioController@user_cad');

Route::post('/user_cad/save', 'UsuarioController@save');

Route::get('/user_lst', 'UsuarioController@user_lst');

Route::get('/senha_alt', 'UsuarioController@senha_alt');

Route::post('/senha_alt/update', 'UsuarioController@update');

/*Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);*/