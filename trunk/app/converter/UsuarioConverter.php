<?php

class UsuarioConverter {
    
    public function fromArray ($array) {
        
        $usuario = new Usuario();
        $usuario->setId(getValorOuNullo('id', $array));
        $usuario->setSenha(getValorOuNullo('senha', $array));
        $usuario->setEmail(getValorOuNullo('email', $array));
        $usuario->setNivel(getValorOuNullo('nivel', $array));
        $usuario->setNome(getValorOuNullo('nome', $array));
        $usuario->setUsuario(getValorOuNullo('usuario', $array));
        
        $empresaId = getValorOuNullo('empresa_id', $array);
        
        if ($empresaId != null) {
            $empresa = new Empresa();
            $empresa->setId($empresaId);
            $usuario->setEmpresa($empresa);
        }
        
        return $usuario;
        
    }
    
    function toRecordSet (Usuario $usuario) {
        return array(
            $usuario->getId(),
            $usuario->getUsuario(),
            $usuario->getSenha(),
            $usuario->getNome(),
            $usuario->getEmail(),
            $usuario->getNivel(),
            $usuario->getEmpresa()->getId()
        );
    }
    
}

