<?php

require_once 'Session.php';

class MensagemDoSistema {

    const ERRO = 'error';
    const SUCESSO = 'success';

    private $tipo;
    private $mensagem;

    public function __construct($tipo, $mensagem) {
        $this->tipo = $tipo;
        $this->mensagem = $mensagem;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getMensagem() {
        return $this->mensagem;
    }
}

class ServicoDeMensagem {
    
    const MENSAGEM_DO_SISTEMA = 'mensagem_do_sistema';
    
    private $session;
    
    public function __construct() {
        $this->session = new Session();
    }
    
    public function setMensagem($tipo, $mensagem) {
        $this->set(new MensagemDoSistema($tipo, $mensagem));
    }
    
    public function set(MensagemDoSistema $message) {
        $this->session->setObject(self::MENSAGEM_DO_SISTEMA, $message);
    }
    
    public function temMensagemParaExibir() {
        return $this->session->has(self::MENSAGEM_DO_SISTEMA);
    }
    
    public function getMensagem () {
        return $this->session->getObject(self::MENSAGEM_DO_SISTEMA);
    }
    
    public function limparMensagem() {
        $this->session->clear(self::MENSAGEM_DO_SISTEMA);
    }
    
    public function exibirMensagem() {
        if ($this->temMensagemParaExibir()) {
            $mensagem = $this->getMensagem();
            ?>
            <div class="alert alert-<?=$mensagem->getTipo()?>">
                <a class="close" data-dismiss="alert">×</a>
                <strong><?=$mensagem->getMensagem()?></strong>
            </div>
            <?
            $this->limparMensagem();
        }
    }

    public function exibirPopUp($msg) {
    ?>
        <html>
            <head>
            
            	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            
            	<?php include_once 'parts/css.php'; ?>
            	<?php include_once 'parts/js.php'; ?>
            
            </head>
            <body>

                <div id="popup_">
                  <p><?=$msg?></p>
                </div>

                <script type="text/javascript">
                    popUp();
                </script>
                
            </body>
        </html>
    <?
        die();
    }
}
