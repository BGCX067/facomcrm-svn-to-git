<?php
include 'lib/lib.php';

include 'modulo/Usuario.php';

include 'parts/cabecalho.php';
?>

<h1>Bem vindo <?=$usuarioAutenticado->getUsuario()?></h1>

<p>
    Trabalho de PROGWEB
</p>


<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<?php
include 'parts/rodape.php';
?>
