<?php

include 'lib/lib.php';

include 'util/ServicoAutenticacao.php';
include 'util/ServicoDeAutorizacao.php';

include 'repository/PessoaRepository.php';

$session = new UsuarioSession();

ServicoAutenticacao::verificaSeEstaAutenticado();

ServicoDeAutorizacao::verificarPermissao(
$session->getUsuarioAutenticado(),
ServicoDeAutorizacao::MODULO_USUARIO,
ServicoDeAutorizacao::ACOES_DELETAR
);

$usuarioAutenticado = $session->getUsuarioAutenticado();

$servicoDeMensagem = new ServicoDeMensagem();

$pdo = getConnection();

$pdo->beginTransaction();

$pessoaId = getValorOuNullo('id', $_GET);

$pessoaRepository = new PessoaRepository($pdo);

$pessoaRepository->delete($pessoaId);

    $auditoria = new Auditoria();
    $auditoriaRepository = new AuditoriaRepository($pdo);
    
    // Auditoria
    $auditoria->setData(date('Y-m-d H:i:s'));
    $auditoria->setAcao(Auditoria::DELETE);
    $auditoria->setObservacao('Tabela: Pessoa - Id:'.$pessoaId);
    $auditoria->setEmpresa($usuarioAutenticado->getEmpresa());
    $auditoria->setUsuario($usuarioAutenticado);
    $auditoriaRepository->add($auditoria);

$pdo->commit();

$servicoDeMensagem->setMensagem(
	MensagemDoSistema::SUCESSO,
	'Deletado com sucesso'
);

redirect('contatos');




