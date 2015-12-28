<?php

include 'lib/lib.php';

include 'modulo/Usuario.php';

$modulo = Modulos::MODULO_SISTEMA;

include 'parts/cabecalho.php';

include 'util/ServicoDeAutorizacao.php';

$session = new UsuarioSession();

$servicoDeMensagem = new ServicoDeMensagem();

ServicoDeAutorizacao::verificarPermissao(
    $session->getUsuarioAutenticado(),
    ServicoDeAutorizacao::MODULO_USUARIO,
    ServicoDeAutorizacao::ACOES_CRIAR
);

?>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span11">

            <ul class="breadcrumb">
                <li><a href="#">Usuário</a> <span class="divider">/</span></li>
                <li class="active">Novo Usuário</li>
            </ul>

            <h2>
                Novo usuário
            </h2>

            <?=$servicoDeMensagem->exibirMensagem()?>

            <form class="form-horizontal" action="cadastrar-usuario" method="post">

                <div class="control-group">
                    <label class="control-label required">Usuário*</label>
                    <div class="controls">
                        <input type="text" name="usuario"/>
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label required">Senha*</label>
                    <div class="controls">
                        <input type="password" name="senha"/>
                    </div>
                </div>
                
                <hr/>
                
                <div class="control-group">
                    <label class="control-label required">Nome*</label>
                    <div class="controls">
                        <input type="text" id="input-nome" name="nome"/>
                        <span class="help-inline">Nome e sobrenome(s). Ex: João Aquino Silveira</span>
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label required">Email*</label>
                    <div class="controls">
                        <input type="text" name="email"/>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label required">Nível*</label>
                    <div class="controls">
                        <select name="nivel">
                            <? foreach(Usuario::$NIVEIS as $indice => $nivel):?>
                            <option value="<?=$indice?>"><?=$nivel?></option>
                            <? endforeach; ?>
                        </select>
                    </div>
                </div>
                
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Cadastrar dados</button>
                    <button type="button" class="btn">Cancelar</button>
                </div>
            </form>


        </div><!--/span-->
    </div><!--/row-->

    <?php include 'parts/rodape.php' ?>