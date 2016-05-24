<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../images/logo-ico.jpg"/>
        <title>Projeto Portabilis - Laravel</title>
        <link href="../vendor/css/bootstrap.min.css" rel="stylesheet">
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="../custom/ie10-viewport-bug-workaround.css" rel="stylesheet">
        <link href="../custom/dashboard.css" rel="stylesheet">
        <link rel="stylesheet" href="../custom/custom.css">
        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="../custom/ie-emulation-modes-warning.js"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/home">i-Educar</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    @if($_SESSION['admin'] == 1)
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="/user_cad">Novo usuário</a>
                            </li>
                        </ul>
                    @endif
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Relatórios <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Relatório geral de alunos</a></li>
                                <li><a href="#">Relatório geral de cursos</a></li>
                                <li><a href="#">Relatório geral de matriculas</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Relatório alunos por curso</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}                                 
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/senha_alt">Alterar senha</a></li>
                                <li><a href="/logout">Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li><a role="button" data-toggle="collapse" href="#admin" aria-expanded="false" aria-controls="collapseExample" id="clickDownCad">
                            Cadastros <span id="down" class="glyphicon glyphicon-chevron-down"></span>
                            </a>
                        </li>
                        <li><a role="button" data-toggle="collapse" href="#admin" aria-expanded="false" aria-controls="collapseExample" id="clickUpCad">
                            Cadastros <span id="up" class="glyphicon glyphicon-chevron-up"></span>
                            </a>
                        </li>
                        <div class="collapse" id="admin">
                            <div class="well">
                                <ul>
                                    <li><a href="/aluno_cad">Alunos</a></li>
                                    <li><a href="/curso_cad">Cursos</a></li>
                                    <li><a href="#">Matriculas</a></li>
                                </ul>
                            </div>
                        </div>

                        <li><a role="button" data-toggle="collapse" href="#agenda" aria-expanded="false" aria-controls="collapseExample" id="clickDownLis">
                            Listagens <span id="down" class="glyphicon glyphicon-chevron-down"></span>
                            </a>
                        </li>
                        <li><a role="button" data-toggle="collapse" href="#agenda" aria-expanded="false" aria-controls="collapseExample" id="clickUpLis">
                            Listagens <span id="up" class="glyphicon glyphicon-chevron-up"></span>
                            </a>
                        </li>
                        <div class="collapse" id="agenda">
                            <div class="well">
                                <ul>
                                    <li><a href="/aluno_lst">Alunos</a></li>
                                    <li><a href="#">Cursos</a></li>
                                    <li><a href="#">Matriculas</a></li>
                                    <li><a href="#">Usuários</a></li>
                                </ul>
                            </div>
                        </div>

                        <li><a role="button" data-toggle="collapse" href="#endereco" aria-expanded="false" aria-controls="collapseExample" id="clickDownPag">
                            Pagamento <span id="down" class="glyphicon glyphicon-chevron-down"></span>
                            </a>
                        </li>
                        <li><a role="button" data-toggle="collapse" href="#endereco" aria-expanded="false" aria-controls="collapseExample" id="clickUpPag">
                            Pagamento <span id="up" class="glyphicon glyphicon-chevron-up"></span>
                            </a>
                        </li>
                        <div class="collapse" id="endereco">
                            <div class="well">
                                <ul>
                                    <li><a href="#">Matriculas</a></li>
                                </ul>
                            </div>
                        </div>                        
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    @yield('conteudo')
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!--<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>-->
        <script src="../vendor/js/bootstrap.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="../custom/holder.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../custom/ie10-viewport-bug-workaround.js"></script>
        <script src="custom/event.js"></script>
        <script>
            window.onload = function(){
                $('#clickUpCad').hide();
                $('#clickUpLis').hide();
                $('#clickUpPag').hide();
            }
        </script>
        @yield('links')
    </body>
</html>