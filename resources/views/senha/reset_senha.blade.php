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
    <body>
        <div class="container">
            <fieldset class="col-md-5 col-md-offset-3">
                <br><br>
                
                <h2>Recuperar senha</h2>

                <form action="/send_link" method="post" class="form-signin">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" name="email" class="form-control input-login" required autofocus>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar link por email</button>
                </form>
            </fieldset>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="vendor/js/bootstrap.min.js"></script>
    </body>
</html>