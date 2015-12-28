<?php

include 'lib/lib.php';

include 'session/UsuarioSession.php';

include 'modulo/Usuario.php';
include 'repository/PessoaRepository.php';

include_once 'repository/AnotacaoRepository.php';

try {
    
    $servicoDeMensagem = new ServicoDeMensagem();

    $pdo = getConnection();

    $pdo->beginTransaction();

    $session = new UsuarioSession();

    $convert = new AnotacaoConverter();
    $anotacao = $convert->fromArray($_POST);

    $usuarioAutenticado = $session->getUsuarioAutenticado();

    $anotacaoRepository = new AnotacaoRepository($pdo);

    $anotacao_antiga = objectToArray($anotacaoRepository->get($anotacao->getId()));
    $anotacao_antiga = print_r($anotacao_antiga, TRUE);
    
    $anotacaoRepository->update($anotacao);

    $auditoria = new Auditoria();
    $auditoriaRepository = new AuditoriaRepository($pdo);
    
    // Auditoria
    $auditoria->setData(date('Y-m-d H:i:s'));
    $auditoria->setAcao(Auditoria::UPDATE);
    $auditoria->setObservacao('Tabela: anotacao - Id:'.$anotacao->getId()."<br> Valores antigos: <pre>".$anotacao_antiga."</pre>");
    $auditoria->setEmpresa($usuarioAutenticado->getEmpresa());
    $auditoria->setUsuario($usuarioAutenticado);
    $auditoriaRepository->add($auditoria);
    
    $pdo->commit();

    $servicoDeMensagem->setMensagem(
        MensagemDoSistema::SUCESSO,
        'Atualizado com sucesso'
    );

    redirect('anotacoes');

} catch (Exception $ex) {
    if (isset($pdo) && $pdo->inTransaction())
        $pdo->rollBack();
    
    throw $ex;
}




