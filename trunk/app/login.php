<?php
    include 'lib/lib.php';
    
    $servicoDeMensagem = new ServicoDeMensagem();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Página de Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="assets/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body>


    <div class="container">

      <form class="form-signin" method="post" action="usuario_logar.php">
        <h2 class="form-signin-heading">Acesso ao sistema</h2>

        <p>Entre com suas credênciais de acesso:</p>

        <input type="text" class="input-block-level" placeholder="Usuario" name="usuario" maxlength="64" />
        <input type="password" class="input-block-level" placeholder="Senha" name="senha" maxlength="16"/>

        <?=$servicoDeMensagem->exibirMensagem()?>

        <hr/>

        <button class="btn btn-large btn-primary" type="submit">Login</button>
      </form>

    </div> <!-- /container -->

  </body>
</html>
