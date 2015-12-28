<?php

include 'lib/lib.php';

include 'session/UsuarioSession.php';

include 'modulo/Usuario.php';
include 'repository/UsuarioRepository.php';
include 'converter/UsuarioConverter.php';

try {
    $session = new UsuarioSession();
    $servicoDeMensagem = new ServicoDeMensagem();

    $pdo = getConnection();
    
    $usuarioAutenticado = $session->getUsuarioAutenticado();
    $usuarioRepository = new UsuarioRepository($pdo);

    $pdo->beginTransaction();
    
    $senhaAntiga = $_POST['senha_antiga'];
    
    $usuario = new Usuario();
    $usuario->setSenha($senhaAntiga);
    $usuario->setUsuario($usuarioAutenticado->getUsuario());
    
    $id = $usuarioRepository->verificaSeTemUsuario($usuario);
    
    if ($_POST['senha'] != $_POST['senha_confirmar']) {
        throw new RegraDeNegocioException('As senhas não conferem!');
    }
    
    $usuario->setSenha($_POST['senha']);
    $usuario->setId($id);
    
    $usuarioRepository->updateSenha($usuario);
    
    $auditoria = new Auditoria();
    $auditoriaRepository = new AuditoriaRepository($pdo);
    
    // Auditoria
    $auditoria->setData(date('Y-m-d H:i:s'));
    $auditoria->setAcao(Auditoria::UPDATE);
    $auditoria->setObservacao('Tabela: Usuario - Id: '.$usuario->getId()." alterou a senha");
    $auditoria->setEmpresa($usuarioAutenticado->getEmpresa());
    $auditoria->setUsuario($usuarioAutenticado);
    $auditoriaRepository->add($auditoria);
    
    $pdo->commit();


    $servicoDeMensagem->setMensagem(
        MensagemDoSistema::SUCESSO,
        'Atualizado com sucesso'
    );

    redirect('alterar-senha');

} catch (Exception $ex) {
    if (isset($pdo) && $pdo->inTransaction())
        $pdo->rollBack();
    
    throw $ex;
}




