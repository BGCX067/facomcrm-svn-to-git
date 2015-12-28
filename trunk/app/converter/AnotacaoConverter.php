<?php

class AnotacaoConverter {

    public function fromArray ($array) {

        $anotacao = new Anotacao();
        $anotacao->setId(getValorOuNullo('id', $array));
        $anotacao->setTitulo(getValorOuNullo('cadastro_titulo', $array));
        $anotacao->setObservacao(getValorOuNullo('cadastro_observacao', $array));
        
        $empresaId = getValorOuNullo('empresa_id', $array);

        if ($empresaId != null) {
            $empresa = new Empresa();
            $empresa->setId($empresaId);
            $anotacao->setEmpresa($empresa);
        }

        $usuarioId = getValorOuNullo('usuario_id', $array);

        if ($usuarioId != null) {
            $usuario = new Usuario();
            $usuario->setId($usuarioId);
            $anotacao->setUsuario($usuario);
        }
        
        $pessoaId = getValorOuNullo('pessoa_id', $array);

        if ($pessoaId != null) {
            $pessoa = new Pessoa();
            $pessoa->setId($pessoaId);
            $anotacao->setPessoa($pessoa);
        }

        $anotacao->setData(date('Y-m-d H:i:s'));

        return $anotacao;

    }

    function toRecordSet (Anotacao $anotacao) {
        return array(
            $anotacao->getId(),
            $anotacao->getTitulo(),
            $anotacao->getObservacao(),
            $anotacao->getData(),
            $anotacao->getEmpresa()->getId(),
            $anotacao->getUsuario()->getId(),
            $anotacao->getPessoa()->getId()
        );
    }

}

