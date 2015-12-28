<?php

include 'lib/lib.php';

include 'session/UsuarioSession.php';

include 'modulo/Usuario.php';
include 'modulo/Anotacao.php';

include 'repository/AnotacaoRepository.php';

try {

    $servicoDeMensagem = new ServicoDeMensagem();

    $auditoria = new Auditoria();

    $pdo = getConnection();

    $auditoriaRepository = new AuditoriaRepository($pdo);

    $pdo->beginTransaction();

    $session = new UsuarioSession();

    $convert = new AnotacaoConverter();
    $anotacao = $convert->fromArray($_POST);

    $usuarioAutenticado = $session->getUsuarioAutenticado();

    $anotacao->setEmpresa($usuarioAutenticado->getEmpresa());
    $anotacao->setUsuario($usuarioAutenticado);

    $anotacaoRepository = new AnotacaoRepository($pdo);

    $anotacaoRepository->add($anotacao);

    // Auditoria
    $auditoria->setData(date('Y-m-d H:i:s'));
    $auditoria->setAcao(Auditoria::INSERT);
    $auditoria->setObservacao('Tabela: anotacao - Id:'.$pdo->lastInsertId());
    $auditoria->setEmpresa($usuarioAutenticado->getEmpresa());
    $auditoria->setUsuario($usuarioAutenticado);
    $auditoriaRepository->add($auditoria);

    $pdo->commit();

    // Criar Sessao para mensagens??

    $servicoDeMensagem->setMensagem(
        MensagemDoSistema::SUCESSO,
        'Inserido com sucesso'
    );

    redirect('anotacoes');

} catch (Exception $ex) {
    if (isset($pdo) && $pdo->inTransaction())
        $pdo->rollBack();

    throw $ex;
}
