<?php
$id = filter_input(INPUT_GET, 'id');

include_once '../class/Passageiro.php';
$passageiro = new Passageiro();

$passageiro->setId($id);
$passageiro->crud(0);
?>

<meta http-equiv="refresh" content="0.1;URL=?p=passageiro/listar">
