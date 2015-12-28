<?php

include 'lib/lib.php';

include 'util/ServicoAutenticacao.php';
include 'util/ServicoDeAutorizacao.php';

include 'repository/AnotacaoRepository.php';

$session = new UsuarioSession();

ServicoAutenticacao::verificaSeEstaAutenticado();

$usuarioAutenticado = $session->getUsuarioAutenticado();

$servicoDeMensagem = new ServicoDeMensagem();

$pdo = getConnection();

$pdo->beginTransaction();

$id = getValorOuNullo('id', $_GET);

$anotacoes = new AnotacaoRepository($pdo);

$anotacoes->delete($id);

    $auditoria = new Auditoria();
    $auditoriaRepository = new AuditoriaRepository($pdo);
    
    // Auditoria
    $auditoria->setData(date('Y-m-d H:i:s'));
    $auditoria->setAcao(Auditoria::DELETE);
    $auditoria->setObservacao('Tabela: Anotacoes - Id:'.$id);
    $auditoria->setEmpresa($usuarioAutenticado->getEmpresa());
    $auditoria->setUsuario($usuarioAutenticado);
    $auditoriaRepository->add($auditoria);

$pdo->commit();

$servicoDeMensagem->setMensagem(
	MensagemDoSistema::SUCESSO,
	'Deletado com sucesso'
);

redirect('anotacoes');




