<?php

include 'util/ServicoAutenticacao.php';

ServicoAutenticacao::verificaSeEstaAutenticado();

$usuarioSession = new UsuarioSession();
$usuarioAutenticado = $usuarioSession->getUsuarioAutenticado();

//echo "<pre>";
//print_r($usuarioAutenticado);
//echo "</pre>";
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
  
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 
    <title>facomcrm</title>

    <!-- CSS -->
    <?php include 'parts/css.php'; ?>

    <!-- JAVASCRIPT -->
    <?php include 'parts/js.php'; ?>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <style type="text/css">
        textarea { width: 60%; height: 200px; }
    </style>
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a id="logo-header" class="brand" href="home">
          	facomcrm / 
          	<span class="dstq"><?=$usuarioAutenticado->getEmpresa()->getNome();?></span>
          </a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="<?=(!isset($modulo)) ? 'active' : ''?>"><a href="home">Home</a></li>
              <li class="dropdown <?=(isset($modulo) && $modulo == Modulos::MODULO_PESSOA) ? 'active' : ''?>">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Contato<b class="caret"></b></a>
                  <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dLabel">
                      <li><a tabindex="-1" href="novo-contato">Novo Contato</a></li>
                      <li><a tabindex="-1" href="buscar-contato">Buscar Contatos</a></li>
                      <li><a tabindex="-1" href="contatos">Gerenciar Contatos</a></li>
                  </ul>
              </li>
              <li class="dropdown <?=(isset($modulo) && $modulo == Modulos::MODULO_ANOTACOES) ? 'active' : ''?>">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Anotações<b class="caret"></b></a>
                <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dLabel">
                      <li><a tabindex="-1" href="nova-anotacao">Nova Anotação</a></li>
                      <li><a tabindex="-1" href="anotacoes">Anotações</a></li>
                  </ul>
              </li>
              <li class="dropdown <?=(isset($modulo) && $modulo == Modulos::MODULO_SISTEMA) ? 'active' : ''?>">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Sistema e Configurações<b class="caret"></b></a>
                  <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dLabel">
                      <li><a tabindex="-1" href="novo-usuario">Novo Usuário</a></li>
                      <li><a tabindex="-1" href="alterar-senha">Alterar Senha</a></li>
                      <li class="divider"></li>
                      <li><a tabindex="-1" href="exibir-auditoria">Exibir Auditoria</a></li>
                  </ul>
              </li>
              <li><a href="logout">Sair</a></li>
            </ul>
          </div><!--/.nav-collapse -->
          
        </div>
      </div>
    </div>
