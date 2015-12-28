<?php
include 'lib/lib.php';
    
$servicoDeMensagem = new ServicoDeMensagem();

$modulo = Modulos::MODULO_PESSOA;

include 'modulo/Usuario.php';

include 'parts/cabecalho.php';

?>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span11">

            <ul class="breadcrumb">
                <li><a href="contatos">Contato</a> <span class="divider">/</span></li>
                <li class="active">Novo Contato</li>
            </ul>

            <h2>
                Novo Contato
            </h2>

            <?=$servicoDeMensagem->exibirMensagem()?>

            <form class="form-horizontal" action="cadastrar-contato" method="post">
                <fieldset>
                    <legend>Tipo de Cadastro</legend>

                    <div class="control-group">
                        <label class="control-label">Selecione o tipo de cadastro:</label>
                        <div class="controls">

                            <label class="radio">
                                <input type="radio" name="tipo" id="radio_PF" value="PF" checked="checked" onchange="alteraPessoaFisicaEJuridica();">
                                <b>Pessoa física</b> <br/>
										Caso o cadastro seja de uma pessoa comum, com RG, CPF e etc.
                            </label>
                            <label class="radio">
                                <input type="radio" name="tipo" id="radio_PJ" value="PJ" onchange="alteraPessoaFisicaEJuridica();">
                                <b>Pessoa jurídica</b> <br/>
										Caso o cadastro seja de uma empresa com CNPJ, inscrição estadual e etc.
                            </label>

                        </div>
                    </div>
                </fieldset>

                <fieldset id="fildset-pf">
                    <legend>Pessoa física</legend>
                    <div class="control-group">
                        <label class="control-label required" for="input-nome">Nome*</label>
                        <div class="controls">
                            <input type="text" id="input-nome" name="cadastro.nome">
                            <span class="help-inline">Nome e sobrenome(s). Ex: João Aquino Silveira</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label required" for="input-cpf">CPF*</label>
                        <div class="controls">
                            <input type="text" id="input-cpf" name="cadastro.cpf">
                        </div>
                    </div>
                </fieldset>

                <fieldset id="fildset-pj">
                    <legend>Pessoa Jurídica</legend>
                    <div class="control-group">
                        <label class="control-label required" for="input-razao-social">Razão Social*</label>
                        <div class="controls">
                            <input type="text" id="input-razao-social" name="cadastro.razaoSocial">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label required" for="input-cnpj">CNPJ*</label>
                        <div class="controls">
                            <input type="text" id="input-cnpj" name="cadastro.cnpj">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input-razao-social">Nome fantasia</label>
                        <div class="controls">
                            <input type="text" id="input-nome-fantasia" name="cadastro.nomeFantasia">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input-inscricao-estadual">Incrição estadual</label>
                        <div class="controls">
                            <input type="text" id="input-inscricao-estadual" name="cadastro.inscricaoEstadual">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input-inscricao-municipal">Incrição municipal</label>
                        <div class="controls">
                            <input type="text" id="input-inscricao-municipal" name="cadastro.inscricaoMunicipal">
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Contato</legend>
                    <div class="control-group">
                        <label class="control-label" for="input-telefone">Telefone nº 1</label>
                        <div class="controls">
                            <input type="text" id="input-telefone" name="cadastro.telefone">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input-telefone2">Telefone nº 2</label>
                        <div class="controls">
                            <input type="text" id="input-telefone2" name="cadastro.telefone2">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input-telefone3">Telefone nº 3</label>
                        <div class="controls">
                            <input type="text" id="input-telefone3" name="cadastro.telefone3">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input-fax">Fax</label>
                        <div class="controls">
                            <input type="text" id="input-fax" name="cadastro.fax">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input-email">E-mail</label>
                        <div class="controls">
                            <input type="text" id="input-email" name="cadastro.email">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input-site">Site</label>
                        <div class="controls">
                            <input type="text" id="input-site" name="cadastro.site">
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Endereço</legend>
                    <div class="control-group">
                        <label class="control-label required" for="input-cep">CEP*</label>
                        <div class="controls">
                            <input type="text" id="input-cep" name="cadastro.cep">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label required" for="input-logradouro">Logradouro*</label>
                        <div class="controls">
                            <input type="text" id="input-nome" name="cadastro.logradouro">
                            <span class="help-inline">Ex: Rua Grajaúna, Avenida Afonso Pena, etc.</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label required" for="input-numero">Número*</label>
                        <div class="controls">
                            <input type="text" id="input-numero" name="cadastro.numero">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input-complemento">Complemento</label>
                        <div class="controls">
                            <input type="text" id="input-complemento" name="cadastro.complemento">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label required" for="input-bairro">Bairro*</label>
                        <div class="controls">
                            <input type="text" id="input-bairro" name="cadastro.bairro">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label required" for="input-cidade">Cidade*</label>
                        <div class="controls">
                            <input type="text" id="input-cidade" name="cadastro.cidade">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label required" for="select-estado">Estado*</label>
                        <div class="controls">
                            <select id="select-estado" name="cadastro.estado">
                                <option value="AC">AC</option>
                                <option value="AL">AL</option>
                                <option value="AM">AM</option>
                                <option value="AP">AP</option>
                                <option value="BA">BA</option>
                                <option value="CE">CE</option>
                                <option value="DF">DF</option>
                                <option value="ES">ES</option>
                                <option value="GO">GO</option>
                                <option value="MA">MA</option>
                                <option value="MG">MG</option>
                                <option value="MS">MS</option>
                                <option value="MT">MT</option>
                                <option value="PA">PA</option>
                                <option value="PB">PB</option>
                                <option value="PE">PE</option>
                                <option value="PI">PI</option>
                                <option value="PR">PR</option>
                                <option value="RJ">RJ</option>
                                <option value="RN">RN</option>
                                <option value="RO">RO</option>
                                <option value="RR">RR</option>
                                <option value="RS">RS</option>
                                <option value="SC">SC</option>
                                <option value="SE">SE</option>
                                <option value="SP">SP</option>
                                <option value="TO">TO</option>
                            </select>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Observações</legend>
                    <div class="control-group">
                        <label class="control-label required" for="input-cep">Observações</label>
                        <div class="controls">
                            <textarea id="cadastro.observacao" name="cadastro.observacao" cols="5" rows="10"></textarea>
                        </div>
                    </div>
                </fieldset>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Cadastrar dados</button>
                    <button type="button" class="btn" onclick="cancelarCadastro();">Cancelar</button>
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
            alteraPessoaFisicaEJuridica();
            $('#dialog-confirm').hide();
            function alteraPessoaFisicaEJuridica() {
                var PF = $('#radio_PF');
                var PJ = $('#radio_PJ');
                var field_PF = $('#fildset-pf');
                var field_PJ = $('#fildset-pj');

                if (PF.is(':checked') == true) {
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
    </head>
    <body></body>
</html>