<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Login</title>
        <link href="vendor/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="custom/custom.css">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="fundo-login">
        <div class="container">
            <fieldset class="col-md-4 col-md-offset-4">
                <br><br>
                @if(Session::has('message_error'))
                     <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{Session::get('message_error')}}
                    </div>
                @endif
            
                @if(!empty($msg_logout))
                    <div class="alert alert-info alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{$msg_logout}}
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2>Acesso ao sistema</h2>
                        <hr>
                        <form action="/logar" method="post" class="form-signin">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" name="email" class="form-control" value="{{old('email')}}" autofocus>
                            </div>
                            <div class="form-group">
                                <label>Senha</label>
                                <input type="password" name="password" class="form-control" value="{{old('password')}}">
                            </div>
                            <div class="form-group">
                                <a href="/reset_senha">Esqueceu sua senha?</a>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-lg"><strong>Entrar</strong></button>
                        </form>
                    </div>
                </div>
            </fieldset>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="vendor/js/bootstrap.min.js"></script>
    </body>
</html>