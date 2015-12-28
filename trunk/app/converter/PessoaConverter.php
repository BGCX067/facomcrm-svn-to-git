<?php

class PessoaConverter {
    
    public function fromArray ($array) {
       
        $pessoa = new Pessoa();

        $pessoa->setId(getValorOuNullo('id', $array));
        $pessoa->setTipo(getValorOuNullo('tipo', $array));
        
        if ($pessoa->getTipo() == 'PF') {
            $pessoa->setNome(getValorOuNullo('cadastro_nome', $array));
            $pessoa->setCpf(getValorOuNullo('cadastro_cpf', $array));

        } else {
            $pessoa->setCnpj(getValorOuNullo('cadastro_cnpj', $array));
            $pessoa->setNome(getValorOuNullo('cadastro_razaoSocial', $array));
            $pessoa->setNome_fantasia(getValorOuNullo('cadastro_nomeFantasia', $array));
            $pessoa->setInscricao_estadual(getValorOuNullo('cadastro_inscricaoEstadual', $array));
            $pessoa->setInscricao_municipal(getValorOuNullo('cadastro_inscricaoMunicipal', $array));
        }

        $pessoa->setTelefone1(getValorOuNullo('cadastro_telefone', $array));
        $pessoa->setTelefone2(getValorOuNullo('cadastro_telefone2', $array));
        $pessoa->setTelefone3(getValorOuNullo('cadastro_telefone3', $array));
        $pessoa->setFax(getValorOuNullo('cadastro_fax', $array));
        $pessoa->setEmail(getValorOuNullo('cadastro_email', $array));
        $pessoa->setSite(getValorOuNullo('cadastro_site', $array));
        $pessoa->setCep(getValorOuNullo('cadastro_cep', $array));
        $pessoa->setLogradouro(getValorOuNullo('cadastro_logradouro', $array));
        $pessoa->setComplemento(getValorOuNullo('cadastro_complemento', $array));
        $pessoa->setBairro(getValorOuNullo('cadastro_bairro', $array));
        $pessoa->setNumero(getValorOuNullo('cadastro_numero', $array));
        $pessoa->setCidade(getValorOuNullo('cadastro_cidade', $array));
        $pessoa->setUf(getValorOuNullo('cadastro_estado', $array));
        $pessoa->setObservacao(getValorOuNullo('cadastro_observacao', $array));
        $pessoa->setData_criacao(date("Y-m-d h:i:s"));
        
        $empresaId = getValorOuNullo('empresa_id', $array);
        $usuarioId = getValorOuNullo('usuario_id', $array);
        
        if ($empresaId != null) {
            $empresa = new Empresa();
            $empresa->setId($empresaId);
            $pessoa->setEmpresa($empresa);
        }

        if ($usuarioId != null) {
            $usuario = new Usuario();
            $usuario->setId($usuarioId);
            $pessoa->setUsuario($usuario);
        }
        
        return $pessoa;
        
    }

    function toRecordSet (Pessoa $pessoa) {
        return array(
            $pessoa->getId(),
            $pessoa->getNome(),
            $pessoa->getTipo(),
            $pessoa->getCnpj(),
            $pessoa->getCpf(),
            $pessoa->getTelefone1(),
            $pessoa->getTelefone2(),
            $pessoa->getTelefone3(),
            $pessoa->getFax(),
            $pessoa->getNome_fantasia(),
            $pessoa->getInscricao_estadual(),
            $pessoa->getInscricao_municipal(),
            $pessoa->getEmail(),
            $pessoa->getObservacao(),
            $pessoa->getSite(),
            $pessoa->getCep(),
            $pessoa->getLogradouro(),
            $pessoa->getBairro(),
            $pessoa->getComplemento(),
            $pessoa->getNumero(),
            $pessoa->getCidade(),
            $pessoa->getUf(),
            $pessoa->getData_criacao(),
            $pessoa->getEmpresa()->getId(),
            $pessoa->getUsuario()->getId()
        );
    }


}
?>
