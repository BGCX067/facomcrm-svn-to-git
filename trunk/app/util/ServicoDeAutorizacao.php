<?php

include_once 'modulo/Usuario.php';

class ServicoDeAutorizacao {
    
    const MODULO_USUARIO = 'Usuario';
    const MODULO_PESSOA = 'Pessoa';
    const MODULO_AUDITORIA = 'Auditoria';
    const ACOES_CRIAR = 'Criar';
    const ACOES_BUSCAR = 'Buscar';
    const ACOES_LISTAR = 'Listar';
    const ACOES_DELETAR = 'Deletar';
    const ACOES_ALTERAR = 'Alterar';
    
    public static $PESOS = array(Usuario::USUARIO => 1, Usuario::ADMINISTRADOR => 2, Usuario::SUPERADMIN => 3);
    
    public static $PERMISSOES = array(
        
        self::MODULO_USUARIO => array(
            self::ACOES_CRIAR   => Usuario::ADMINISTRADOR,
            self::ACOES_BUSCAR  => Usuario::USUARIO,
            self::ACOES_LISTAR  => Usuario::USUARIO,
            self::ACOES_DELETAR => Usuario::SUPERADMIN,
            self::ACOES_ALTERAR => Usuario::ADMINISTRADOR   
        ),
        
        self::MODULO_PESSOA => array(
            self::ACOES_CRIAR   => Usuario::ADMINISTRADOR,
            self::ACOES_BUSCAR  => Usuario::USUARIO,
            self::ACOES_LISTAR  => Usuario::USUARIO,
            self::ACOES_DELETAR => Usuario::SUPERADMIN,
            self::ACOES_ALTERAR => Usuario::ADMINISTRADOR
        ),
        
        self::MODULO_AUDITORIA => array(
            self::ACOES_LISTAR  => Usuario::SUPERADMIN
        )
        
    );
    
    public static function temPermissao(Usuario $usuario, $modulo, $acao) {
        $nivelMinimo = self::getNivelMinimoAcesso($modulo, $acao);
        $pesoUsuario = self::$PESOS[$usuario->getNivel()];
        $pesoMinimo  = self::$PESOS[$nivelMinimo];
        
        return ($pesoUsuario >= $pesoMinimo);
    }
    
    
    private static function getAcoes($modulo) {
        $acoes = isset(self::$PERMISSOES[$modulo]) ? self::$PERMISSOES[$modulo] : NULL;
        if ($acoes == NULL) {
            throw new TecnicaException('Módulo "'.$modulo.'" inválido');
        }
        
        return $acoes;
    }
    
    private static function getNivelMinimoAcesso($modulo, $acao) {
        $acoes = self::getAcoes($modulo);
        $nivel = isset($acoes[$acao]) ? $acoes[$acao] : NULL;
        
        if ($nivel == NULL) {
            throw new TecnicaException('Ação "'.$acao.'" inválida');
        }
        
        return $nivel;
    }
    
    public static function verificarPermissao(Usuario $usuario, $modulo, $acao) {
        if (nao(self::temPermissao($usuario, $modulo, $acao))) {
            throw new PermissaoInvalidaException('Usuário não tem permissão para realizar essa ação!');
        }
    }
    
}

?>
