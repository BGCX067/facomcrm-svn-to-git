<?php

class Auditoria {
    const INSERT = 'INSERT';
    const UPDATE = 'UPDATE';
    const DELETE = 'DELETE';

    public static $ACOES = array(
        self::INSERT => 'INSERT',
        self::UPDATE => 'UPDATE',
        self::DELETE => 'DELETE'
    );

    private $id;
    private $data;
    private $observacao;
    private $acao;
    private $usuario;
    private $empresa;

    function __construct() {

    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setObservacao($observacao) {
        $this->observacao = $observacao;
    }

    public function setAcao($acao) {
        if (!isset(self::$ACOES[$acao]))
            throw new RegraDeNegocioException('Ação inválida!');
        
        $this->acao = $acao;
    }

    public function setUsuario($usuario) {
        if ($usuario == NULL)
            throw new RegraDeNegocioException('Usuário deve ser definido!');
        $this->usuario = $usuario;
    }

    public function setEmpresa($empresa) {
        if ($empresa == NULL)
            throw new RegraDeNegocioException('Empresa deve ser definida!');
        $this->empresa = $empresa;
    }

    public function getId() {
        return $this->id;
    }

    public function getData() {
        return $this->data;
    }

    public function getObservacao() {
        return $this->observacao;
    }

    public function getAcao() {
        return $this->acao;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getEmpresa() {
        return $this->empresa;
    }

}

