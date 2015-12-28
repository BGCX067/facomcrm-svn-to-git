<?php

include_once 'modulo/Usuario.php';
include_once 'modulo/Anotacao.php';
include_once 'modulo/Pessoa.php';
require_once 'converter/AnotacaoConverter.php';

class AnotacaoRepository {

    private static $TABELA_ANOTACAO = 'anotacao';

    /**
     * @var PDO
     */
    private $pdo;

    private $converter;

    function __construct($pdo) {
        $this->pdo = $pdo;
        $this->converter = new AnotacaoConverter();
    }

    public function add(Anotacao $anotacao) {
        $stmt = $this->pdo->prepare('
            INSERT INTO
                '.self::$TABELA_ANOTACAO.'
                (id, titulo, observacao, data, empresa_id, usuario_id, pessoa_id)
            VALUES
                (?, ?, ?, ?, ?, ?, ?)
        ');

        $queryParams = $this->converter->toRecordSet($anotacao);

        $stmt->execute($queryParams);
    }

    public function listar() {
        $stmt = $this->pdo->query('SELECT * FROM '.self::$TABELA_ANOTACAO);
        return $stmt->fetchAll();
    }
    
    public function update(Anotacao $anotacao) {
    	$stmt = $this->pdo->prepare('
            update
                '.self::$TABELA_ANOTACAO.'
            set
                id=?, titulo=?, observacao=?, data=?, empresa_id=?, usuario_id=?, pessoa_id=?
            where
    		id=?
        ');
    
    	$queryParams = $this->converter->toRecordSet($anotacao);
    	
    	$queryParams[] = $anotacao->getId();
    
    	$stmt->execute($queryParams);
    }
    
    public function get ($id) {
    	return queryOne('
    		select
    			*
    		from
    			'.self::$TABELA_ANOTACAO.'
    		where
    			id=?',
    		array($id)
    	);
    }
    
    public function delete ($id) {
        $stmt = $this->pdo->prepare('
            delete from
                '.self::$TABELA_ANOTACAO.'
            where
    		id=?
        ');

    	$stmt->execute(array($id));
    }
}
?>
