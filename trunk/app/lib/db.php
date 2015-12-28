<?php

include 'config/db.php';

$pdo = null;

/**
 * @return PDO
 */
function getConnection () {
    global $pdo;

    if ($pdo == null) {

        $dbSgdb = DB_SGDB;
        $dbAddres = DB_ADDRES;
        $dbName = DB_NAME;
        $dbUser = DB_USER;
        $dbPassword = DB_PASSWORD;

        $pdo = new PDO("{$dbSgdb}:host={$dbAddres};dbname={$dbName}", $dbUser, $dbPassword);

        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET NAMES 'UTF8'");
    }

    return $pdo;
}

/**
 * @param string $sql_statment
 * @param array  $params
 * @return PDOStatement
 */
function query ($sqlStatment, $params = array()) {

    $pdo = getConnection();

    $stmt = $pdo->prepare($sqlStatment);

    $stmt->execute($params);

    return $stmt;
}


/**
 * @param string $sql_statment
 * @param array  $params
 * @return Object da primeira posição do result set do resultado ou
 * 			false caso não tenha encontrado nenhum resultado.
 */
function queryOne ($sqlStatment, $params = array()) {
    return query($sqlStatment, $params)->fetch();
}
