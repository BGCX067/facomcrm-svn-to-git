<?php

function vazio_ou_nulo($val) {
    return $val == null || trim($val) == '';
}

function is_md5($md5) {
    return!empty($md5) && preg_match('/^[a-f0-9]{32}$/', $md5);
}

function email_valido($email) {
    $regexp = "/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/";
    return preg_match($regexp, $email) > 0;
}

function getValorOuNullo($chave, $array) {
    return isset($array[$chave]) ? $array[$chave] : NULL;
}

//-----------------------------------------------------
//Funcao: validaCNPJ($cnpj)
//Sinopse: Verifica se o valor passado é um CNPJ válido
// Retorno: Booleano
// Autor: Gabriel Fróes - www.codigofonte.com.br
//-----------------------------------------------------
function validaCNPJ($cnpj) {
    if (strlen($cnpj) <> 18)
        return 0;
    $soma1 = ($cnpj[0] * 5) +
            ($cnpj[1] * 4) +
            ($cnpj[3] * 3) +
            ($cnpj[4] * 2) +
            ($cnpj[5] * 9) +
            ($cnpj[7] * 8) +
            ($cnpj[8] * 7) +
            ($cnpj[9] * 6) +
            ($cnpj[11] * 5) +
            ($cnpj[12] * 4) +
            ($cnpj[13] * 3) +
            ($cnpj[14] * 2);
    $resto = $soma1 % 11;
    $digito1 = $resto < 2 ? 0 : 11 - $resto;
    $soma2 = ($cnpj[0] * 6) +
            ($cnpj[1] * 5) +
            ($cnpj[3] * 4) +
            ($cnpj[4] * 3) +
            ($cnpj[5] * 2) +
            ($cnpj[7] * 9) +
            ($cnpj[8] * 8) +
            ($cnpj[9] * 7) +
            ($cnpj[11] * 6) +
            ($cnpj[12] * 5) +
            ($cnpj[13] * 4) +
            ($cnpj[14] * 3) +
            ($cnpj[16] * 2);
    $resto = $soma2 % 11;
    $digito2 = $resto < 2 ? 0 : 11 - $resto;
    return (($cnpj[16] == $digito1) && ($cnpj[17] == $digito2));
}

/**
 * validaCPF
 *
 * Esta função testa se um cpf é valido ou não.
 *
 * @author	Raoni Botelho Sporteman <raonibs@gmail.com>
 * @version	1.0 Debugada em 26/09/2011 no PHP 5.3.8
 * @param	string		$cpf			Guarda o cpf como ele foi digitado pelo cliente
 * @param	array		$num			Guarda apenas os números do cpf
 * @param	boolean		$isCpfValid		Guarda o retorno da função
 * @param	int			$multiplica 	Auxilia no Calculo dos Dígitos verificadores
 * @param	int			$soma			Auxilia no Calculo dos Dígitos verificadores
 * @param	int			$resto			Auxilia no Calculo dos Dígitos verificadores
 * @param	int			$dg				Dígito verificador
 * @return	boolean						"true" se o cpf é válido ou "false" caso o contrário
 *
 */
function validaCPF($cpf) {
    //Etapa 1: Cria um array com apenas os digitos numéricos, isso permite receber o cpf em diferentes formatos como "000.000.000-00", "00000000000", "000 000 000 00" etc...
    $j = 0;
    for ($i = 0; $i < (strlen($cpf)); $i++) {
        if (is_numeric($cpf[$i])) {
            $num[$j] = $cpf[$i];
            $j++;
        }
    }
    //Etapa 2: Conta os dígitos, um cpf válido possui 11 dígitos numéricos.
    if (count($num) != 11) {
        $isCpfValid = false;
    }
    //Etapa 3: Combinações como 00000000000 e 22222222222 embora não sejam cpfs reais resultariam em cpfs válidos após o calculo dos dígitos verificares e por isso precisam ser filtradas nesta parte.
    else {
        for ($i = 0; $i < 10; $i++) {
            if ($num[0] == $i && $num[1] == $i && $num[2] == $i && $num[3] == $i && $num[4] == $i && $num[5] == $i && $num[6] == $i && $num[7] == $i && $num[8] == $i) {
                $isCpfValid = false;
                break;
            }
        }
    }
    //Etapa 4: Calcula e compara o primeiro dígito verificador.
    if (!isset($isCpfValid)) {
        $j = 10;
        for ($i = 0; $i < 9; $i++) {
            $multiplica[$i] = $num[$i] * $j;
            $j--;
        }
        $soma = array_sum($multiplica);
        $resto = $soma % 11;
        if ($resto < 2) {
            $dg = 0;
        } else {
            $dg = 11 - $resto;
        }
        if ($dg != $num[9]) {
            $isCpfValid = false;
        }
    }
    //Etapa 5: Calcula e compara o segundo dígito verificador.
    if (!isset($isCpfValid)) {
        $j = 11;
        for ($i = 0; $i < 10; $i++) {
            $multiplica[$i] = $num[$i] * $j;
            $j--;
        }
        $soma = array_sum($multiplica);
        $resto = $soma % 11;
        if ($resto < 2) {
            $dg = 0;
        } else {
            $dg = 11 - $resto;
        }
        if ($dg != $num[10]) {
            $isCpfValid = false;
        } else {
            $isCpfValid = true;
        }
    }
    
    //Etapa 6: Retorna o Resultado em um valor booleano.
    return $isCpfValid;
}

function validaCep($cep) {
    // retira espacos em branco
    $cep = trim($cep);
    // expressao regular para avaliar o cep
    return preg_match("/^[0-9]{5}-[0-9]{3}$/", $cep) == 1;
}

function nao($declaracao) {
    return $declaracao == FALSE;
}


function redirect($pagina) {
?>
    <html>
        <head>
            <script type="text/javascript">
                window.document.location.href = "<?=$pagina?>"
            </script>
        </head>
        <body></body>
    </html>
<?
    die();
}

function back() {
?>
    <html>
        <head>
            <script type="text/javascript">
                history.back();
            </script>
        </head>
        <body></body>
    </html>
<?
    die();
}

function objectToArray($d) {
    if (is_object($d)) {
            // Gets the properties of the given object
            // with get_object_vars function
            $d = get_object_vars($d);
    }

    if (is_array($d)) {
            /*
            * Return array converted to object
            * Using __FUNCTION__ (Magic constant)
            * for recursive call
            */
            return array_map(__FUNCTION__, $d);
    }
    else {
            // Return array
            return $d;
    }
}


class AplicacaoException extends Exception {

}

class TecnicaException extends AplicacaoException {

}

class RegraDeNegocioException extends AplicacaoException {

}

class PermissaoInvalidaException extends RegraDeNegocioException {
    
}

class Modulos {
    const MODULO_PESSOA = "PESSOA";
    const MODULO_USUARIO = "USUARIO";
    const MODULO_ANOTACOES = "ANOTACOES";
    const MODULO_SISTEMA = "SISTEMA";
}
