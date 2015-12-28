<?php

include 'lib/lib.php';

include 'session/UsuarioSession.php';

include 'modulo/Usuario.php';

include 'repository/UsuarioRepository.php';
include 'converter/UsuarioConverter.php';

try {
    
    $servicoDeMensagem = new ServicoDeMensagem();
    
    $auditoria = new Auditoria();

    $pdo = getConnection();

    $auditoriaRepository = new AuditoriaRepository($pdo);

    $pdo->beginTransaction();
    
    $usuarioSession = new UsuarioSession();

    $convert = new UsuarioConverter();

    $usuario = $convert->fromArray($_POST);

    $usuarioAutenticado = $usuarioSession->getUsuarioAutenticado();

    $usuario->setEmpresa($usuarioAutenticado->getEmpresa());

    $usuarioRepository = new UsuarioRepository($pdo);
    
    $usuarioRepository->add($usuario);

    // Auditoria
    $auditoria->setData(date('Y-m-d H:i:s'));
    $auditoria->setAcao(Auditoria::INSERT);
    $auditoria->setObservacao('Tabela: usuario - Id:'.$pdo->lastInsertId());
    $auditoria->setEmpresa($usuarioAutenticado->getEmpresa());
    $auditoria->setUsuario($usuarioAutenticado);
    $auditoriaRepository->add($auditoria);


    $pdo->commit();

    $servicoDeMensagem->setMensagem(
        MensagemDoSistema::SUCESSO,
        'Inserido com sucesso'
    );

    redirect('novo-usuario');

} catch (Exception $ex) {
    if (isset($pdo) && $pdo->inTransaction())
        $pdo->rollBack();

    throw $ex;
}




