<?php

include 'lib/lib.php';

include 'session/UsuarioSession.php';

include 'modulo/Usuario.php';
include 'repository/PessoaRepository.php';

include_once 'repository/AuditoriaRepository.php';

try {
    
    $servicoDeMensagem = new ServicoDeMensagem();

    $pdo = getConnection();

    $pdo->beginTransaction();

    $session = new UsuarioSession();

    $convert = new PessoaConverter();
    
    $pessoa = $convert->fromArray($_POST);

    $usuarioAutenticado = $session->getUsuarioAutenticado();

    $pessoaRepository = new PessoaRepository($pdo);

    $pessoa_antigo = objectToArray($pessoaRepository->get($pessoa->getId()));
    $pessoa_antigo = print_r($pessoa_antigo, TRUE);
   
    $pessoaRepository->update($pessoa);

    $auditoria = new Auditoria();
    $auditoriaRepository = new AuditoriaRepository($pdo);
    
    // Auditoria
    $auditoria->setData(date('Y-m-d H:i:s'));
    $auditoria->setAcao(Auditoria::UPDATE);
    $auditoria->setObservacao('Tabela: Pessoa - Id:'.$pessoa->getId()."<br> Valores antigos: <pre>".$pessoa_antigo."</pre>");
    $auditoria->setEmpresa($usuarioAutenticado->getEmpresa());
    $auditoria->setUsuario($usuarioAutenticado);
    $auditoriaRepository->add($auditoria);
    
    $pdo->commit();

    $servicoDeMensagem->setMensagem(
        MensagemDoSistema::SUCESSO,
        'Atualizado com sucesso'
    );

    redirect('contatos');

} catch (Exception $ex) {
    if (isset($pdo) && $pdo->inTransaction())
        $pdo->rollBack();
    
    throw $ex;
}




