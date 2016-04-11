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
    $identificador = $_POST['listaID'];
    $db->addNota($nota, $fecha, $orden, 0, $identificador);


  
}
 redirect("../index.php?listaID=$identificador");
        ?>