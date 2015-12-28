<?php

include 'lib/lib.php';

$servicoDeMensagem = new ServicoDeMensagem();

$modulo = Modulos::MODULO_ANOTACOES;

include 'modulo/Usuario.php';

include 'repository/PessoaRepository.php';

include 'repository/AnotacaoRepository.php';

include 'parts/cabecalho.php';

$id = getValorOuNullo('id', $_GET);

$pdo = getConnection();
$pessoaRepository = new PessoaRepository($pdo);
$session = new UsuarioSession();
$empresa = $session->getUsuarioAutenticado()->getEmpresa();

$anotacaoRepository = new AnotacaoRepository($pdo);
$anotacao = $anotacaoRepository->get($id);

$listaPessoas = $pessoaRepository->listar($empresa);

?>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span11">

            <ul class="breadcrumb">
                <li><a href="anotacoes">Anotações</a> <span class="divider">/</span></li>
                <li class="active">Editar Anotação</li>
            </ul>

            <h2>
                Nova Anotação
            </h2>

            <?=$servicoDeMensagem->exibirMensagem()?>

            <form class="form-horizontal" action="editar-anotacao" method="post">
                <fieldset>
                    <legend></legend>
                    
                    <input type="hidden" name="id" value="<?=$anotacao->id?>"/>
                    <input type="hidden" name="empresa_id" value="<?=$anotacao->empresa_id?>"/>
                    <input type="hidden" name="usuario_id" value="<?=$anotacao->usuario_id?>"/>
                    <input type="hidden" name="data" value="<?=$anotacao->data?>"/>

                    <div class="control-group">
                        <label class="control-label required" for="input-nome">Título*</label>
                        <div class="controls">
                            <input type="text" id="input-titulo" name="cadastro.titulo" value="<?=$anotacao->titulo?>" style="width:60%;">
                            <span class="help-inline">Título para a anotação. Ex: Pagamento</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label required" for="input-nome">Anotação*</label>
                        <div class="controls">
                            <textarea name="cadastro.observacao" id="textarea-observacao"><?=$anotacao->observacao?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label required" for="input-nome">Contato*</label>
                        <div class="controls">
                            <select name="pessoa_id">
                                <?php foreach ($listaPessoas as $pessoa): ?>
                                    
                                <option <?=$anotacao->pessoa_id==$pessoa->id?'selected="selected"':NULL?> value="<?=$pessoa->id;?>"><?=$pessoa->nome?></option>
                                    
                                <?php endforeach; ?>
                            </select>
                            <span class="help-inline">Contato referente a anotação</span>
                        </div>
                    </div>
                </fieldset>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Atualizar dados</button>
                </div>
            </form>
            <div id="dialog-confirm">
                <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Todos os dados preenchidos no cadastro serão perdidos!</p>
            </div>

        </div><!--/span-->
    </div><!--/row-->

<?php include 'parts/rodape.php' ?>

<html>
    <head>
        <script type="text/javascript">
            $('#dialog-confirm').hide();
        </script>
    </head>
    <body></body>
</html>