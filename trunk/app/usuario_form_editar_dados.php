<?php

include 'lib/lib.php';

include 'modulo/Usuario.php';

$modulo = Modulos::MODULO_SISTEMA;

include 'parts/cabecalho.php';

$servicoDeMensagem = new ServicoDeMensagem();

?>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span11">

            <ul class="breadcrumb">
                <li><a href="#">Usuário</a> <span class="divider">/</span></li>
                <li class="active">Alterar Senha</li>
            </ul>

            <h2>
                Alterar Senha
            </h2>

            <?=$servicoDeMensagem->exibirMensagem()?>

            <form class="form-horizontal" action="editar-dados-usuario" method="post">

                
                <div class="control-group">
                    <label class="control-label required">Senha antiga*</label>
                    <div class="controls">
                        <input type="password" name="senha_antiga"/>
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label required">Nova senha*</label>
                    <div class="controls">
                        <input type="password" name="senha"/>
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label required">Confirmar Senha*</label>
                    <div class="controls">
                        <input type="password" name="senha_confirmar"/>
                    </div>
                </div>
                
                <hr/>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Atualizar dados</button>
                </div>
            </form>


        </div><!--/span-->
    </div><!--/row-->

    <?php include 'parts/rodape.php' ?>