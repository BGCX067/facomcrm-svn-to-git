<?php
include 'lib/lib.php';

include 'util/ServicoDeAutorizacao.php';

include 'repository/AnotacaoRepository.php';

$modulo = Modulos::MODULO_ANOTACOES;

include 'parts/cabecalho.php';

$session = new UsuarioSession();

$pdo = getConnection();
$anotacoes = new AnotacaoRepository($pdo);

$listaAnotacoes = query('
    select
        anotacao.*,
        pessoa.nome as pessoaNome
    from
        anotacao
    inner join
        pessoa
    on
        (anotacao.pessoa_id=pessoa.id)
    where
        anotacao.empresa_id=?
', array($session->getUsuarioAutenticado()->getEmpresa()->getId()));

$servicoDeMensagem = new ServicoDeMensagem();

?>

<script type="text/javascript">

function deletar(id) {
	if (confirm('Você tem certeza que deseja deletar esse registro?')) {
		window.location = "deletar-anotacao?id=" + id;
	}
}

</script>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span11">

            <ul class="breadcrumb">
                <li><a href="#">Contato</a> <span class="divider">/</span></li>
                <li class="active">Lista de Contatos</li>
            </ul>

            <h2>
                Lista de Anotações
            </h2>

            <?=$servicoDeMensagem->exibirMensagem()?>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <td>Titulo</td>
                        <td>Pessoa</td>
                        <td>Ação</td>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($listaAnotacoes as $anotacao): ?>
                    <tr>
                        <td>
                            <div class="std-info-card">
                                <strong class="title"><?=$anotacao->titulo;?></strong>
                            </div>
                        </td>
                        <td>
                            <?=$anotacao->pessoaNome;?>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="form-editar-anotacao?id=<?=$anotacao->id?>" class="btn btn-info">Editar</a>
                                <a onclick="deletar(<?=$anotacao->id?>)" class="btn btn-danger">Deletar</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div><!--/span-->
    </div><!--/row-->

    <?php include 'parts/rodape.php' ?>