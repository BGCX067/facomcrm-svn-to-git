<?php

include 'lib/lib.php';

include 'session/UsuarioSession.php';

include 'modulo/Usuario.php';
include 'repository/PessoaRepository.php';

try {
    
    $servicoDeMensagem = new ServicoDeMensagem();
    $auditoria = new Auditoria();
    
    $pdo = getConnection();

    $auditoriaRepository = new AuditoriaRepository($pdo);
    
    $pdo->beginTransaction();

    $session = new UsuarioSession();

    $convert = new PessoaConverter();
    $pessoa = $convert->fromArray($_POST);

    $usuarioAutenticado = $session->getUsuarioAutenticado();

    $pessoa->setEmpresa($usuarioAutenticado->getEmpresa());
    $pessoa->setUsuario($usuarioAutenticado);

    $pessoaRepository = new PessoaRepository($pdo);

    $pessoaRepository->add($pessoa);

    // Auditoria
    $auditoria->setData(date('Y-m-d H:i:s'));
    $auditoria->setAcao(Auditoria::INSERT);
    $auditoria->setObservacao('Tabela: pessoa - Id:'.$pdo->lastInsertId());
    $auditoria->setEmpresa($usuarioAutenticado->getEmpresa());
    $auditoria->setUsuario($usuarioAutenticado);
    $auditoriaRepository->add($auditoria);

    $pdo->commit();

    // Criar Sessao para mensagens??

    $servicoDeMensagem->setMensagem(
        MensagemDoSistema::SUCESSO,
        'Inserido com sucesso'
    );

    redirect('contatos');

} catch (Exception $ex) {
    if (isset($pdo) && $pdo->inTransaction())
        $pdo->rollBack();
    
    throw $ex;
}




