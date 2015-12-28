<?php

include_once 'modulo/Auditoria.php';
include_once 'converter/AuditoriaConverter.php';

class AuditoriaRepository {
    
    private static $TABELA_AUDITORIA = 'auditoria';
    
    /**
     * @var PDO 
     */
    private $pdo;
    
    private $converter;
    
    function __construct($pdo) {
        $this->pdo = $pdo;
        $this->converter = new AuditoriaConverter();
    }

    public function add (Auditoria $auditoria) {
        $stmt = $this->pdo->prepare('
            INSERT INTO
                '.self::$TABELA_AUDITORIA.'
                (id, data, observacao, acao, nome_usuario, empresa_id)
            VALUES
                (?, ?, ?, ?, ?, ?)
        ');
        
        $queryParams = $this->converter->toRecordSet($auditoria);
        
        $stmt->execute($queryParams);
    }
    
    public function listar (Empresa $empresa) {
        $stmt = $this->pdo->query('
            SELECT id, DATE_FORMAT(data, "%d/%m/%Y %H:%i:%s") as data, observacao, acao, nome_usuario, empresa_id
                FROM
            '.self::$TABELA_AUDITORIA.'
                WHERE
            empresa_id = '.$empresa->getId().'
            ORDER BY id DESC
        ');
        
        return $stmt->fetchAll();
    }
}

