<?php
include 'lib/lib.php';

include 'util/ServicoDeAutorizacao.php';
    

include 'modulo/Pessoa.php';

include 'repository/PessoaRepository.php';

$modulo = Modulos::MODULO_PESSOA;

include 'parts/cabecalho.php';;

$pdo = getConnection();
$pessoaRepository = new PessoaRepository($pdo);
$session = new UsuarioSession();
$empresa = $session->getUsuarioAutenticado()->getEmpresa();

$tipo = "";
if (isset($_POST['buscar_nome'])) {
    if (isset($_POST['tipo_pf'])) {
        if (!isset($_POST['tipo_pj'])) {
            $tipo = $_POST['tipo_pf'];
        }
    } else if (isset($_POST['tipo_pj'])) {
        if (!isset($_POST['tipo_pf'])) {
            $tipo = $_POST['tipo_pj'];
        }
    }
    $listaPessoas = $pessoaRepository->buscar($empresa, $_POST['buscar_nome'], $tipo);
} else {
    $listaPessoas = $pessoaRepository->listar($empresa);
}



$servicoDeMensagem = new ServicoDeMensagem();
?>

<script type="text/javascript">

function deletar(pessoaId) {
    if (confirm('Você tem certeza que deseja deletar esse registro?')) {
            window.location = "deletar-contato?id=" + pessoaId;
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
                Lista de Contatos
            </h2>

            <?=$servicoDeMensagem->exibirMensagem()?>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <td>Cadastro</td>
                        <td>Contato</td>
                        <td>Tipo</td>
                        <td>Ação</td>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($listaPessoas as $pessoa): ?>
                    <tr>
                        <td>
                            <div class="std-info-card">
                                <strong class="title"><?=$pessoa->nome;?></strong>
                            </div>
                        </td>
                        <td>
                            <?php
                            
                                $telefone = "";
                                if ($pessoa->telefone1 != "") {
                                    $telefone .= $pessoa->telefone1;
                                }
                                if ($pessoa->telefone2 != "") {
                                    if ($telefone == "")
                                        $telefone .= $pessoa->telefone2;
                                    else
                                        $telefone .= " / ".$pessoa->telefone2;
                                }
                                if ($pessoa->telefone3 != "") {
                                    if ($telefone == "")
                                        $telefone .= $pessoa->telefone3;
                                    else
                                        $telefone .= " / ".$pessoa->telefone3;
                                }
                            ?>

                            <? if ($telefone != ""): ?>
                            <i class="icon-phone"></i> <?=$telefone;?>
                            <br/>
                            <? endif; ?>
                            

                            <? if ($pessoa->email != ""): ?>
                            <i class="icon-envelope"></i> <?=$pessoa->email;?>
                            <? endif; ?>
                        </td>
                        <td>
                            <?=Pessoa::$TIPOS[$pessoa->tipo];?>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="form-editar-contato?id=<?=$pessoa->id?>" class="btn btn-info">Editar</a>
                                <?if(ServicoDeAutorizacao::temPermissao(
                                		$usuarioAutenticado,
                                		ServicoDeAutorizacao::MODULO_PESSOA,
                                		ServicoDeAutorizacao::ACOES_DELETAR)):?>
                                	<a onclick="deletar(<?=$pessoa->id?>)" class="btn btn-danger">Deletar</a>
                                <?endif;?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div><!--/span-->
    </div><!--/row-->

    <?php include 'parts/rodape.php' ?>