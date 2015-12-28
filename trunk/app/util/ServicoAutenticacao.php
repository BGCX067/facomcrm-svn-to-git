<?php
include 'session/UsuarioSession.php';

class ServicoAutenticacao {

    public static function autenticarUsuario(Usuario $usuario) {
        $session = new UsuarioSession();
        $session->setUsuarioAutenticado($usuario);
    }

    public static function verificaSeEstaAutenticado() {
        $session = new UsuarioSession();
        $usuario = $session->getUsuarioAutenticado();

        if ($usuario == NULL) {
            redirect('login');
            die();
        }
    }

    public static function deslogar() {
        $session = new UsuarioSession();
        
        $session->clearUsuarioAutenticado();

        redirect('login');
    }
}

?>
