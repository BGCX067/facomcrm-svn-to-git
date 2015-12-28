<?php

include 'lib/lib.php';

include 'modulo/Usuario.php';

$modulo = Modulos::MODULO_PESSOA;

include 'parts/cabecalho.php';

include 'util/ServicoDeAutorizacao.php';

$session = new UsuarioSession();

$servicoDeMensagem = new ServicoDeMensagem();


ServicoDeAutorizacao::verificarPermissao(
    $session->getUsuarioAutenticado(),
    ServicoDeAutorizacao::MODULO_USUARIO,
    ServicoDeAutorizacao::ACOES_BUSCAR
);

?>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span11">

            <ul class="breadcrumb">
                <li><a href="contatos">Contato</a> <span class="divider">/</span></li>
                <li class="active">Buscar Contatos</li>
            </ul>

            <h2>
                Buscar Contatos
            </h2>

            <?=$servicoDeMensagem->exibirMensagem()?>

            <form class="form-horizontal" action="contatos" method="post">

                <div class="control-group">
                    <label class="control-label">Por Nome</label>
                    <div class="controls">
                        <input type="text" name="buscar.nome"/>
                    </div>
                </div>
                
                <hr/>
                
                <div class="control-group">
                    <label class="control-label">Por Tipo</label>
                    <div class="controls">
                        <label class="checkbox">
                            <input type="checkbox" name="tipo_pf" value="PF"/> Pessoa Física
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" name="tipo_pj" value="PJ"/> Pessoa Jurídica
                        </label>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <button type="button" class="btn">Cancelar</button>
                </div>
            </form>


        </div><!--/span-->
    </div><!--/row-->

    <?php include 'parts/rodape.php' ?>