<?php

require_once 'modulo/Empresa.php';

class Usuario {

    const USUARIO = 'USUARIO';
    const ADMINISTRADOR = 'ADMINISTRADOR';
    const SUPERADMIN = 'SUPERADMIN';

    public static $NIVEIS = array(
        self::USUARIO => 'Usuário',
        self::ADMINISTRADOR => 'Administrador',
        self::SUPERADMIN => 'Super administrador'
    );
    
    private $id;
    private $usuario;
    private $senha;
    private $nome;
    private $email;
    private $nivel;
    private $empresa;

    public function __construct() {
        $this->id = 0;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUsuario($usuario) {

        if (vazio_ou_nulo($usuario))
            throw new RegraDeNegocioException('Usuário não pode ser vazio!');

        $usuarioTamanho = strlen($usuario);

        if ($usuarioTamanho > 16 || $usuarioTamanho < 4)
            throw new RegraDeNegocioException('Usuário deve ter entre 4 e 16 caracteres!');

        if (preg_match('/^[A-Za-z0-9_]+$/', $usuario) == 0)
            throw new RegraDeNegocioException('Usuário aceita apenas letras, números e underline!');

        $this->usuario = $usuario;
    }

    public function setSenha($senha) {

        if (vazio_ou_nulo($senha))
            throw new RegraDeNegocioException('Senha não pode ser vazia!');

        $senhaTamanho = strlen($senha);

        if ($senhaTamanho > 16 || $senhaTamanho < 4)
            throw new RegraDeNegocioException('Senha deve ter entre 4 e 16 caracteres!');

        if (!is_md5($senha))
            $senha = md5($senha);

        $this->senha = $senha;
    }

    public function setNome($nome) {

        if (vazio_ou_nulo($nome))
            throw new RegraDeNegocioException('Nome não pode ser vazio!');

        $nomeTamanho = strlen($nome);

        if ($nomeTamanho > 45 || $nomeTamanho < 4)
            throw new RegraDeNegocioException('Nome deve ter entre 4 e 45 caracteres!');

        $this->nome = ucwords(strtolower(trim($nome)));
    }

    public function setEmail($email) {

        if (!email_valido($email))
            throw new RegraDeNegocioException('Email inválido!');

        $this->email = $email;
    }

    public function setNivel($nivel) {

        if (!isset(self::$NIVEIS[$nivel]))
            throw new RegraDeNegocioException('Nível inválido!');

        $this->nivel = $nivel;
    }

    public function setEmpresa(Empresa $empresa) {
        if ($empresa == NULL)
            throw new RegraDeNegocioException('Empresa deve ser definida!');

        $this->empresa = $empresa;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getNivel() {
        return $this->nivel;
    }

    public function getEmpresa() {
        return $this->empresa;
    }
}
