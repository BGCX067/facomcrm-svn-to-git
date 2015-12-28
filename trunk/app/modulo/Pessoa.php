<?php

class Pessoa {
    const PJ = 'PJ';
    const PF = 'PF';

    public static $TIPOS = array(
        self::PJ => 'Pessoa Jurídica',
        self::PF => 'Pessoa Física'
    );
    private $id;
    private $nome;
    private $cnpj;
    private $cpf;
    private $telefone1;
    private $telefone2;
    private $telefone3;
    private $fax;
    private $nome_fantasia;
    private $inscricao_estadual;
    private $inscricao_municipal;
    private $email;
    private $observacao;
    private $site;
    private $cep;
    private $logradouro;
    private $bairro;
    private $complemento;
    private $numero;
    private $cidade;
    private $uf;
    private $tipo;
    private $data_criacao;
    private $data_atualizacao;
    private $empresa;
    private $usuario;

    function __construct() {

    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        if (vazio_ou_nulo($nome))
            throw new RegraDeNegocioException('Nome não pode ser vazio!');

        $nomeTamanho = strlen($nome);

        if ($nomeTamanho > 45 || $nomeTamanho < 4)
            throw new RegraDeNegocioException('Nome deve ter entre 4 e 45 caracteres!');

        $this->nome = ucwords(strtolower(trim($nome)));
    }

    public function setCnpj($cnpj) {
        if (vazio_ou_nulo($cnpj))
            throw new RegraDeNegocioException('CNPJ não pode ser vazio!');

        if (!validaCNPJ($cnpj))
            throw new RegraDeNegocioException('CNPJ inválido!');

        $this->cnpj = $cnpj;
    }

    public function setCpf($cpf) {
        if (vazio_ou_nulo($cpf))
            throw new RegraDeNegocioException('CPF não pode ser vazio!');
        
        if (!validaCPF($cpf))
            throw new RegraDeNegocioException('CPF inválido!');

        $this->cpf = $cpf;
    }

    public function setTelefone1($telefone1) {
        $telefone1Tamanho = strlen($telefone1);

        if ($telefone1Tamanho != 0 && ($telefone1Tamanho > 14 || $telefone1Tamanho < 8))
            throw new RegraDeNegocioException('Telefone número 1 deve ter entre 8 e 14 caracteres!');

        $this->telefone1 = $telefone1;
    }

    public function setTelefone2($telefone2) {
        $telefone2Tamanho = strlen($telefone2);

        if ($telefone2Tamanho != 0 && ($telefone2Tamanho > 14 || $telefone2Tamanho < 8))
            throw new RegraDeNegocioException('Telefone número 2 deve ter entre 8 e 14 caracteres!');
        
        $this->telefone2 = $telefone2;
    }

    public function setTelefone3($telefone3) {
        $telefone3Tamanho = strlen($telefone3);

        if ($telefone3Tamanho != 0 && ($telefone3Tamanho > 14 || $telefone3Tamanho < 8))
            throw new RegraDeNegocioException('Telefone número 3 deve ter entre 8 e 14 caracteres!');

        $this->telefone3 = $telefone3;
    }

    public function setFax($fax) {
        $this->fax = $fax;
    }

    public function setNome_fantasia($nome_fantasia) {
        $this->nome_fantasia = $nome_fantasia;
    }

    public function setInscricao_estadual($inscricao_estadual) {
        $this->inscricao_estadual = $inscricao_estadual;
    }

    public function setInscricao_municipal($inscricao_municipal) {
        $this->inscricao_municipal = $inscricao_municipal;
    }

    public function setEmail($email) {
        // Permitir email vazio
        if (!vazio_ou_nulo($email) && !email_valido($email))
            throw new RegraDeNegocioException('Email inválido!');

        $this->email = $email;
    }

    public function setObservacao($observacao) {
        $this->observacao = $observacao;
    }

    public function setSite($site) {
        $this->site = $site;
    }

    public function setCep($cep) {
        if (vazio_ou_nulo($cep))
            throw new RegraDeNegocioException('Cep não pode ser vazio!');

        if (!validaCep($cep))
            throw new RegraDeNegocioException('Cep inválido!');
        
        $this->cep = $cep;
    }

    public function setLogradouro($logradouro) {
        if (vazio_ou_nulo($logradouro))
            throw new RegraDeNegocioException('Logradouro não pode ser vazio!');

        $logradouroTamanho = strlen($logradouro);

        if ($logradouroTamanho > 45 || $logradouroTamanho < 4)
            throw new RegraDeNegocioException('Logradouro deve ter entre 4 e 45 caracteres!');

        $this->logradouro = $logradouro;
    }

    public function setBairro($bairro) {
        if (vazio_ou_nulo($bairro))
            throw new RegraDeNegocioException('Bairro não pode ser vazio!');

        $bairroTamanho = strlen($bairro);

        if ($bairroTamanho > 30 || $bairroTamanho < 4)
            throw new RegraDeNegocioException('Bairro deve ter entre 4 e 30 caracteres!');
        
        $this->bairro = $bairro;
    }

    public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    public function setNumero($numero) {
        if (vazio_ou_nulo($numero))
            throw new RegraDeNegocioException('Número não pode ser vazio!');

        if (!is_numeric($numero))
            throw new RegraDeNegocioException('Número inválido!');

        $this->numero = $numero;
    }

    public function setCidade($cidade) {
        if (vazio_ou_nulo($cidade))
            throw new RegraDeNegocioException('Cidade não pode ser vazio!');

            $cidadeTamanho = strlen($cidade);

        if ($cidadeTamanho > 30 || $cidadeTamanho < 4)
            throw new RegraDeNegocioException('Cidade deve ter entre 4 e 30 caracteres!');
        
        $this->cidade = $cidade;
    }

    public function setUf($uf) {
        // Vai vir de um select
        if (vazio_ou_nulo($uf))
            throw new RegraDeNegocioException('UF não pode ser vazio!');
        
        $this->uf = $uf;
    }

    public function setData_criacao($data_criacao) {
        $this->data_criacao = $data_criacao;
    }

    public function setData_atualizacao($data_atualizacao) {
        $this->data_atualizacao = $data_atualizacao;
    }

    public function setTipo($tipo) {
        if (!isset(self::$TIPOS[$tipo]))
            throw new RegraDeNegocioException('Tipo inválido!');

        $this->tipo = $tipo;
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

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getTelefone1() {
        return $this->telefone1;
    }

    public function getTelefone2() {
        return $this->telefone2;
    }

    public function getTelefone3() {
        return $this->telefone3;
    }

    public function getFax() {
        return $this->fax;
    }

    public function getNome_fantasia() {
        return $this->nome_fantasia;
    }

    public function getInscricao_estadual() {
        return $this->inscricao_estadual;
    }

    public function getInscricao_municipal() {
        return $this->inscricao_municipal;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getObservacao() {
        return $this->observacao;
    }

    public function getSite() {
        return $this->site;
    }

    public function getCep() {
        return $this->cep;
    }

    public function getLogradouro() {
        return $this->logradouro;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getComplemento() {
        return $this->complemento;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getUf() {
        return $this->uf;
    }

    public function getData_criacao() {
        return $this->data_criacao;
    }

    public function getData_atualizacao() {
        return $this->data_atualizacao;
    }

    public function getEmpresa() {
        return $this->empresa;
    }

    public function getUsuario() {
        return $this->usuario;
    }
    
    public function getTipo() {
        return $this->tipo;
    }


    
}

