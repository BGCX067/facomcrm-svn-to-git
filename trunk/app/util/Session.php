<?php

class Session {

    public function __construct() {
        // session_status() é suportado apenas em php >= 5.4.0
        // http://php.net/manual/pt_BR/function.session-status.php
        // Estamos usando php 5.2
        
        //if (session_status() == PHP_SESSION_DISABLED)
        if (!isset($_SESSION))        
            session_start();
    }

    public function get($chave) {
        return getValorOuNullo($chave, $_SESSION);
    }

    public function clear($chave) {
        unset($_SESSION[$chave]);
    }

    public function set($chave, $valor) {
        $_SESSION[$chave] = $valor;
    }
    
    public function setObject($chave, $valor) {
        $_SESSION[$chave] = serialize($valor);
    }
    
    public function has ($chave) {
        return $this->get($chave) != NULL;
    }
    
    public function getObject($chave) {
        $valor = getValorOuNullo($chave, $_SESSION);
        
        if ($valor != null)
            $valor = unserialize($valor);
        
        return $valor;
    }

    public function destroy() {
        session_destroy();
    }
}

?>
