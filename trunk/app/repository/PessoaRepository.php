<?php

include_once 'modulo/Pessoa.php';
include_once 'modulo/Empresa.php';
require_once 'converter/PessoaConverter.php';

class PessoaRepository {

    private static $TABELA_PESSOA = 'pessoa';

    /**
     * @var PDO
     */
    private $pdo;

    private $converter;

    function __construct($pdo) {
        $this->pdo = $pdo;
        $this->converter = new PessoaConverter();
    }
    
    public function get ($id) {
    	return queryOne('
    		select
    			*
    		from
    			'.self::$TABELA_PESSOA.'
    		where
    			id=?',
    		array($id)
    	);
    }

    public function add(Pessoa $pessoa) {
        $stmt = $this->pdo->prepare('
            INSERT INTO
                '.self::$TABELA_PESSOA.'
                (id, nome, tipo, cnpj, cpf, telefone1, telefone2, telefone3, fax, nome_fantasia, inscricao_estadual, inscricao_municipal,
                email, observacao, site, cep, logradouro, bairro, complemento, numero, cidade, uf, data_criacao, empresa_id, usuario_id)
            VALUES
                (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');

        $queryParams = $this->converter->toRecordSet($pessoa);

        $stmt->execute($queryParams);
    }

    public function update(Pessoa $pessoa) {
    	$stmt = $this->pdo->prepare('
            UPDATE
                '.self::$TABELA_PESSOA.'
            SET
                id=?, nome=?, tipo=?, cnpj=?, cpf=?, telefone1=?, telefone2=?, telefone3=?, fax=?, nome_fantasia=?, inscricao_estadual=?, inscricao_municipal=?,
    			email=?, observacao=?, site=?, cep=?, logradouro=?, bairro=?, complemento=?, numero=?, cidade=?, uf=?, data_criacao=?, empresa_id=?, usuario_id=?
    		WHERE
    			id=?
        ');
    
    	$queryParams = $this->converter->toRecordSet($pessoa);
    	
    	$queryParams[] = $pessoa->getId();
    
    	$stmt->execute($queryParams);
    }
    
    public function delete ($id) {
        $stmt = $this->pdo->prepare('
            delete from
                '.self::$TABELA_PESSOA.'
            where
    			id=?
        ');

    	$stmt->execute(array($id));
    }
    
    public function listar(Empresa $empresa) {
        if ($empresa == NULL) {
            throw new TecnicaException('Empresa não definida!');
        }
			
        $stmt = $this->pdo->query('SELECT * FROM '.self::$TABELA_PESSOA.' WHERE empresa_id = '.$empresa->getId());
		
        return $stmt->fetchAll();
    }
    
    public function buscar(Empresa $empresa, $nome, $tipo = "") {
        if ($empresa == NULL) {
            throw new TecnicaException('Empresa não definida!');
        }
        
        $varTipo = "";
        if ($tipo != "")
            $varTipo = 'AND tipo = "'.$tipo.'"';
            
        
        
        $stmt = $this->pdo->query(
                'SELECT * FROM '.self::$TABELA_PESSOA.' WHERE empresa_id = '.$empresa->getId().' AND nome LIKE "%'.$nome.'%" '.$varTipo

            );
		
        return $stmt->fetchAll();
        
        
        
    }
    

}
?>
