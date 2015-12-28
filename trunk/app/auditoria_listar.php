<?php
include 'lib/lib.php';

include 'util/ServicoDeAutorizacao.php';

$modulo = Modulos::MODULO_SISTEMA;

include 'parts/cabecalho.php';;

$pdo = getConnection();
$session = new UsuarioSession();
$empresa = $session->getUsuarioAutenticado()->getEmpresa();

ServicoDeAutorizacao::verificarPermissao(
    $session->getUsuarioAutenticado(),
    ServicoDeAutorizacao::MODULO_AUDITORIA,
    ServicoDeAutorizacao::ACOES_LISTAR
);

$auditoriaRepository = new AuditoriaRepository($pdo);
$listaAuditoria = $auditoriaRepository->listar($empresa);

$servicoDeMensagem = new ServicoDeMensagem();

?>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span11">

            <ul class="breadcrumb">
                <li><a href="#">Sistema e Configurações</a> <span class="divider">/</span></li>
                <li class="active">Exibir Auditoria</li>
            </ul>

            <h2>
                Exibir Auditoria
            </h2>

            <?=$servicoDeMensagem->exibirMensagem()?>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <td>Data</td>
                        <td>Ação</td>
                        <td>Observação</td>
                        <td>Quem realizou</td>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($listaAuditoria as $auditoria): ?>
                    <tr>
                        <td>
                            <div class="std-info-card">
                                <strong class="title"><?=$auditoria->data;?></strong>
                            </div>
                        </td>
                        <td>
                            <?=$auditoria->acao;?>
                        </td>
                        <td>
                            <?=$auditoria->observacao;?>
                        </td>
                        <td>
                            <?=$auditoria->nome_usuario;?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div><!--/span-->
    </div><!--/row-->

    <?php include 'parts/rodape.php' ?>