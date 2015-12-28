<?php

include_once 'util/Session.php';

class UsuarioSession {

    const USUARIO_AUTENTICADO = 'usuario';

    private $session;

    public function __construct() {
        $this->session = new Session();
    }

    public function getUsuarioAutenticado() {
        
        $string = $this->session->get(self::USUARIO_AUTENTICADO);
        return unserialize($string);
    }
    
    public function setUsuarioAutenticado(Usuario $usuarioAutenticado) {
        $this->session->set(self::USUARIO_AUTENTICADO, serialize($usuarioAutenticado));
    }

    public function clearUsuarioAutenticado() {
        $this->session->clear(self::USUARIO_AUTENTICADO);
    }

}
