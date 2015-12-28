<?php

class Anotacao {
    
    private $id;
    private $titulo;
    private $observacao;
    private $data;
    private $empresa;
    private $usuario;
    private $pessoa;

    function __construct() {
        $this->id = 0;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTitulo($titulo) {
        if (vazio_ou_nulo($titulo))
            throw new RegraDeNegocioException('Título não pode ser vazio!');
        $this->titulo = $titulo;
    }

    public function setObservacao($observacao) {
        $this->observacao = $observacao;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setEmpresa($empresa) {
        if ($empresa == NULL)
            throw new RegraDeNegocioException('Empresa deve ser definida!');
        $this->empresa = $empresa;
    }

    public function setUsuario($usuario) {
        if ($usuario == NULL)
            throw new RegraDeNegocioException('Usuário deve ser definido!');
        $this->usuario = $usuario;
    }
    
    public function setPessoa($pessoa) {
        if ($pessoa == NULL)
            throw new RegraDeNegocioException('Pessoa deve ser definido!');
        $this->pessoa = $pessoa;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getObservacao() {
        return $this->observacao;
    }

    public function getData() {
        return $this->data;
    }

    public function getEmpresa() {
        return $this->empresa;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getPessoa() {
        return $this->pessoa;
    }
}
