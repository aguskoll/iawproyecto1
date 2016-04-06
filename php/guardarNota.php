<?php
function redirect($url) {
    header("Location: $url");
    die();
}
include_once('db.php');

if (isset($_POST['nueva'])) {
    $db = new Model();
    $nota = $_POST['nota'];
    $fecha = $_POST['fecha'];
    $orden = $_POST['orden'];
    $url = $_POST['listaID'];
    $db->addNota($nota, $fecha, $orden, 0, $url);
}
$dir="./index.php?listaID=".$_POST['listaID'];

redirect($dir);
?> 