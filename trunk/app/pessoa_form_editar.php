<?php
include 'lib/lib.php';
  
$servicoDeMensagem = new ServicoDeMensagem();

$modulo = Modulos::MODULO_PESSOA;

$pessoaId = getValorOuNullo('id', $_GET);

include 'modulo/Usuario.php';

include 'repository/PessoaRepository.php';

$pessoas = new PessoaRepository(getConnection());

$pessoa = $pessoas->get($pessoaId);

include 'parts/cabecalho.php';

?>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span11">

            <ul class="breadcrumb">
                <li><a href="contatos">Contato</a> <span class="divider">/</span></li>
                <li class="active">Editar Contato</li>
            </ul>

            <h2>
                Novo Contato
            </h2>

            <?=$servicoDeMensagem->exibirMensagem()?>

            <form class="form-horizontal" action="editar-contato" method="post">
            
            	<input type="hidden" name="id" value="<?=$pessoa->id?>" />
            	<input type="hidden" name="tipo" value="<?=$pessoa->tipo?>" />
            	<input type="hidden" name="usuario_id" value="<?=$pessoa->usuario_id?>" />
            	<input type="hidden" name="empresa_id" value="<?=$pessoa->empresa_id?>" />
            	
                <fieldset id="fildset-pf">
                    <legend>Pessoa física</legend>
                    <div class="control-group">
                        <label class="control-label required" for="input-nome">Nome*</label>
                        <div class="controls">
                            <input type="text" id="input-nome" name="cadastro.nome" value="<?=$pessoa->nome?>">
                            <span class="help-inline">Nome e sobrenome(s). Ex: João Aquino Silveira</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label required" for="input-cpf">CPF*</label>
                        <div class="controls">
                            <input type="text" id="input-cpf" name="cadastro.cpf" value="<?=$pessoa->cpf?>">
                        </div>
                    </div>
                </fieldset>

                <fieldset id="fildset-pj">
                    <legend>Pessoa Jurídica</legend>
                    <div class="control-group">
                        <label class="control-label required" for="input-razao-social">Razão Social*</label>
                        <div class="controls">
                            <input type="text" id="input-razao-social" name="cadastro.razaoSocial" value="<?=$pessoa->nome?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label required" for="input-cnpj">CNPJ*</label>
                        <div class="controls">
                            <input type="text" id="input-cnpj" name="cadastro.cnpj" value="<?=$pessoa->cnpj?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input-razao-social">Nome fantasia</label>
                        <div class="controls">
                            <input type="text" id="input-nome-fantasia" name="cadastro.nomeFantasia" value="<?=$pessoa->nome_fantasia?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input-inscricao-estadual">Incrição estadual</label>
                        <div class="controls">
                            <input type="text" id="input-inscricao-estadual" name="cadastro.inscricaoEstadual" value="<?=$pessoa->inscricao_estadual?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input-inscricao-municipal">Incrição municipal</label>
                        <div class="controls">
                            <input type="text" id="input-inscricao-municipal" name="cadastro.inscricaoMunicipal" value="<?=$pessoa->inscricao_municipal?>">
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Contato</legend>
                    <div class="control-group">
                        <label class="control-label" for="input-telefone">Telefone nº 1</label>
                        <div class="controls">
                            <input type="text" id="input-telefone" name="cadastro.telefone" value="<?=$pessoa->telefone1?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input-telefone2">Telefone nº 2</label>
                        <div class="controls">
                            <input type="text" id="input-telefone2" name="cadastro.telefone2" value="<?=$pessoa->telefone2?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input-telefone3">Telefone nº 3</label>
                        <div class="controls">
                            <input type="text" id="input-telefone3" name="cadastro.telefone3" value="<?=$pessoa->telefone3?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input-fax">Fax</label>
                        <div class="controls">
                            <input type="text" id="input-fax" name="cadastro.fax" value="<?=$pessoa->fax?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input-email">E-mail</label>
                        <div class="controls">
                            <input type="text" id="input-email" name="cadastro.email" value="<?=$pessoa->email?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input-site">Site</label>
                        <div class="controls">
                            <input type="text" id="input-site" name="cadastro.site" value="<?=$pessoa->site?>">
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Endereço</legend>
                    <div class="control-group">
                        <label class="control-label required" for="input-cep">CEP*</label>
                        <div class="controls">
                            <input type="text" id="input-cep" name="cadastro.cep" value="<?=$pessoa->cep?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label required" for="input-logradouro">Logradouro*</label>
                        <div class="controls">
                            <input type="text" id="input-nome" name="cadastro.logradouro" value="<?=$pessoa->logradouro?>">
                            <span class="help-inline">Ex: Rua Grajaúna, Avenida Afonso Pena, etc.</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label required" for="input-numero">Número*</label>
                        <div class="controls">
                            <input type="text" id="input-numero" name="cadastro.numero" value="<?=$pessoa->numero?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input-complemento">Complemento</label>
                        <div class="controls">
                            <input type="text" id="input-complemento" name="cadastro.complemento" value="<?=$pessoa->complemento?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label required" for="input-bairro">Bairro*</label>
                        <div class="controls">
                            <input type="text" id="input-bairro" name="cadastro.bairro" value="<?=$pessoa->bairro?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label required" for="input-cidade">Cidade*</label>
                        <div class="controls">
                            <input type="text" id="input-cidade" name="cadastro.cidade" value="<?=$pessoa->cidade?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label required" for="select-estado">Estado*</label>
                        <div class="controls">
                            <select id="select-estado" name="cadastro.estado">
                                <option value="AC" <?=$pessoa->uf =='AC' ? 'selected="selected"' : NULL ?>>AC</option>
                                <option value="AL" <?=$pessoa->uf =='AL' ? 'selected="selected"' : NULL ?>>AL</option>
                                <option value="AM" <?=$pessoa->uf =='AM' ? 'selected="selected"' : NULL ?>>AM</option>
                                <option value="AP" <?=$pessoa->uf =='AP' ? 'selected="selected"' : NULL ?>>AP</option>
                                <option value="BA" <?=$pessoa->uf =='BA' ? 'selected="selected"' : NULL ?>>BA</option>
                                <option value="CE" <?=$pessoa->uf =='CE' ? 'selected="selected"' : NULL ?>>CE</option>
                                <option value="DF" <?=$pessoa->uf =='DF' ? 'selected="selected"' : NULL ?>>DF</option>
                                <option value="ES" <?=$pessoa->uf =='ES' ? 'selected="selected"' : NULL ?>>ES</option>
                                <option value="GO" <?=$pessoa->uf =='GO' ? 'selected="selected"' : NULL ?>>GO</option>
                                <option value="MA" <?=$pessoa->uf =='MA' ? 'selected="selected"' : NULL ?>>MA</option>
                                <option value="MG" <?=$pessoa->uf =='MG' ? 'selected="selected"' : NULL ?>>MG</option>
                                <option value="MS" <?=$pessoa->uf =='MS' ? 'selected="selected"' : NULL ?>>MS</option>
                                <option value="MT" <?=$pessoa->uf =='MT' ? 'selected="selected"' : NULL ?>>MT</option>
                                <option value="PA" <?=$pessoa->uf =='PA' ? 'selected="selected"' : NULL ?>>PA</option>
                                <option value="PB" <?=$pessoa->uf =='PB' ? 'selected="selected"' : NULL ?>>PB</option>
                                <option value="PE" <?=$pessoa->uf =='PE' ? 'selected="selected"' : NULL ?>>PE</option>
                                <option value="PI" <?=$pessoa->uf =='PI' ? 'selected="selected"' : NULL ?>>PI</option>
                                <option value="PR" <?=$pessoa->uf =='PR' ? 'selected="selected"' : NULL ?>>PR</option>
                                <option value="RJ" <?=$pessoa->uf =='RJ' ? 'selected="selected"' : NULL ?>>RJ</option>
                                <option value="RN" <?=$pessoa->uf =='RN' ? 'selected="selected"' : NULL ?>>RN</option>
                                <option value="RO" <?=$pessoa->uf =='RO' ? 'selected="selected"' : NULL ?>>RO</option>
                                <option value="RR" <?=$pessoa->uf =='RR' ? 'selected="selected"' : NULL ?>>RR</option>
                                <option value="RS" <?=$pessoa->uf =='RS' ? 'selected="selected"' : NULL ?>>RS</option>
                                <option value="SC" <?=$pessoa->uf =='SC' ? 'selected="selected"' : NULL ?>>SC</option>
                                <option value="SE" <?=$pessoa->uf =='SE' ? 'selected="selected"' : NULL ?>>SE</option>
                                <option value="SP" <?=$pessoa->uf =='SP' ? 'selected="selected"' : NULL ?>>SP</option>
                                <option value="TO" <?=$pessoa->uf =='TO' ? 'selected="selected"' : NULL ?>>TO</option>
                            </select>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Observações</legend>
                    <div class="control-group">
                        <label class="control-label required" for="input-cep">Observações</label>
                        <div class="controls">
                            <textarea id="cadastro.observacao" name="cadastro.observacao" cols="5" rows="10"><?=$pessoa->observacao?></textarea>
                        </div>
                    </div>
                </fieldset>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Editar dados</button>
                    <button type="button" class="btn" onclick="cancelarCadastro();">Cancelar</button>
                </div>
            </form>
            <div id="dialog-confirm">
                <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Todos os dados preenchidos no cadastro serão perdidos!</p>
            </div>

        </div><!--/span-->
    </div><!--/row-->

	<script type="text/javascript">
            alteraPessoaFisicaEJuridica();
            
            $('#dialog-confirm').hide();
            
            function alteraPessoaFisicaEJuridica() {

            	var tipo = $('input[name="tipo"]').val();
                
                var field_PF = $('#fildset-pf');
                var field_PJ = $('#fildset-pj');

                if (tipo == 'PF') {
                    field_PF.show();
                    field_PJ.hide();
                } else {
                    field_PF.hide();
                    field_PJ.show();
                }
            }
            
            $(document).ready(function(){
                $("#input-cpf").mask("999.999.999-99");
                $("#input-cnpj").mask("99.999.999/9999-99");
                $("#input-telefone").mask("(99)9999-9999");
                $("#input-telefone2").mask("(99)9999-9999");
                $("#input-telefone3").mask("(99)9999-9999");
                $("#input-fax").mask("(99)9999-9999");
                $("#input-cep").mask("99999-999");
            });
    </script>

<?php include 'parts/rodape.php' ?>
