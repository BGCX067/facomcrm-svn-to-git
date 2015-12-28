<?php

include_once 'modulo/Usuario.php';
include_once 'modulo/Empresa.php';

class UsuarioRepository {
    
    private static $TABELA_USUARIO = 'usuario';
    private static $TABELA_EMPRESA = 'empresa';
    
    /**
     * @var PDO 
     */
    private $pdo;
    
    private $converter;
    
    function __construct($pdo) {
        $this->pdo = $pdo;
        $this->converter = new UsuarioConverter();
    }

    public function temUsuario(Usuario $usuario) {
        $stmt = $this->pdo->prepare('
            SELECT * FROM '.self::$TABELA_USUARIO.'
                WHERE usuario = ?
        ');

        $queryParams = array(
            $usuario->getUsuario()
        );

        $stmt->execute($queryParams);

        $row = $stmt->fetch();

        if ($row != NULL && count($row) > 0) {
            return true;
        }

        return false;
    }

    public function add (Usuario $usuario) {
        if ($this->temUsuario($usuario)) {
            throw new RegraDeNegocioException("Usuário já cadastrado no sistema, escolha outro nome de usuário para o cadastro!");
        }

        $stmt = $this->pdo->prepare('
            INSERT INTO
                '.self::$TABELA_USUARIO.'
                (id, usuario, senha, nome, email, nivel, empresa_id)
            VALUES
                (?, ?, ?, ?, ?, ?, ?)
        ');
        
        $queryParams = $this->converter->toRecordSet($usuario);
        
        $stmt->execute($queryParams);
    }

    public function verificaSeTemUsuario (Usuario $usuario) {
        $stmt = $this->pdo->prepare('
            SELECT
                *
            FROM
                '.self::$TABELA_USUARIO.' AS u
            WHERE
                usuario = ?
            AND
                senha = ?
        ');

        $queryParams = array(
            $usuario->getUsuario(),
            $usuario->getSenha()
        );

        $stmt->execute($queryParams);
        
        $row = $stmt->fetch();

        if ($row == NULL || count($row) == 0) {
            throw new RegraDeNegocioException("Senha antiga incorreta");
        }
        
        return $row->id;
    }
    
    public function getUsuarioByUsuarioESenha (Usuario $usuario) {
        $stmt = $this->pdo->prepare('
            SELECT
                u.id AS usuario_id, 
                u.usuario AS usuario_usuario,
                u.nome AS usuario_nome,
                u.email AS usuario_email,
                u.nivel AS usuario_nivel,
                e.id AS empresa_id,
                e.nome AS empresa_nome,
                e.tel AS empresa_tel,
                e.email AS empresa_email
            FROM
                '.self::$TABELA_USUARIO.' AS u
            INNER JOIN
                '.self::$TABELA_EMPRESA.' AS e
            ON
                (u.empresa_id = e.id)
            WHERE
                u.usuario = ?
            AND
                u.senha = ?
        ');

        $queryParams = array(
            $usuario->getUsuario(),
            $usuario->getSenha()
        );

        $stmt->execute($queryParams);
        
        $row = $stmt->fetch();

        if ($row == NULL || count($row) == 0) {
            throw new RegraDeNegocioException("Usuário ou senha inválidos");
        }

        $usuario->setId($row->usuario_id);
        $usuario->setNome($row->usuario_nome);
        $usuario->setEmail($row->usuario_email);
        $usuario->setNivel($row->usuario_nivel);
        $usuario->setUsuario($row->usuario_usuario);

        $empresa = new Empresa();
        $empresa->setId($row->empresa_id);
        $empresa->setNome($row->empresa_nome);
        $empresa->setTel($row->empresa_tel);
        $empresa->setEmail($row->empresa_email);

        $usuario->setEmpresa($empresa);


        return $usuario;
    }
    
    function updateSenha(Usuario $usuario) {
        $stmt = $this->pdo->prepare('
            UPDATE
                '.self::$TABELA_USUARIO.'
            SET
                senha = ?
            WHERE
                id=?
        ');
    
    	$queryParams = array($usuario->getSenha(), $usuario->getId());
    	$stmt->execute($queryParams);
    }
    
}

