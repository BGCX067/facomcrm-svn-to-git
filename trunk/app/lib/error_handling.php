<?php

include 'util/ServicoDeMensagem.php';

function my_error_handler ($errno, $errstr, $errfile, $errline) {
    
    if ($errno == E_STRICT)
        return;
    
    throw new TecnicaException("{$errno}:{$errstr} at {$errfile}:{$errline}");
}

function my_exception_handler (Exception $exception) {
  
    $mensagem = new ServicoDeMensagem();
    
    $exceptionClass = get_class($exception);
    
    if ($exceptionClass == 'RegraDeNegocioException') {
        $mensagem->setMensagem(MensagemDoSistema::ERRO, $exception->getMessage());
    } else if ($exceptionClass == 'PermissaoInvalidaException') {

		$mensagem->exibirPopUp($exception->getMessage());
    }
    else {
        $mensagem->setMensagem(MensagemDoSistema::ERRO, 'Problemas na execução do sistema! Contate o administrador! ' .$exception->getMessage(). $exception->getTraceAsString());
        
        // log_error($exception);
    }
    
    back();
}

set_exception_handler('my_exception_handler');
set_error_handler('my_error_handler');
