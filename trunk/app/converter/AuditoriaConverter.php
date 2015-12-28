<?php

class AuditoriaConverter {
    
    function toRecordSet (Auditoria $auditoria) {
        return array(
            $auditoria->getId(),
            $auditoria->getData(),
            $auditoria->getObservacao(),
            $auditoria->getAcao(),
            $auditoria->getUsuario()->getUsuario(),
            $auditoria->getEmpresa()->getId()
        );
    }
    
}

