<?php

include 'lib/lib.php';

include 'modulo/Usuario.php';
include 'repository/UsuarioRepository.php';
include 'converter/UsuarioConverter.php';
include 'util/ServicoAutenticacao.php';

$servicoDeMensagem = new ServicoDeMensagem();
$servicoDeMensagem->limparMensagem();

try {

    $pdo = getConnection();
    
    // Seta dados do usuario vindos do formulario
    $usuario = new Usuario();
    $usuario->setUsuario($_POST['usuario']);
    $usuario->setSenha($_POST['senha']);

    $usuarios = new UsuarioRepository($pdo);

    $usuario = $usuarios->getUsuarioByUsuarioESenha($usuario);
    
    ServicoAutenticacao::autenticarUsuario($usuario);

    redirect('home');

} catch (Exception $ex) {
    if (isset($pdo) && $pdo->inTransaction())
        $pdo->rollBack();

    $servicoDeMensagem->setMensagem(MensagemDoSistema::ERRO, $ex->getMessage());
    
    back();
    //throw $ex;
}




