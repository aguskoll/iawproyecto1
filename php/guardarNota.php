<?php
function redirect($url) {
    header("Location: $url");
    die();
}
include_once('db.php');

    $db = new Model();
    $nota = $_POST['nota'];
    $link = $_POST['link'];
    $fecha = $_POST['fecha'];
    $identificador = $_POST['listaID'];
    $orden = ($db->contar($identificador))+1;
    $db->addNota($nota, $link, $fecha, $orden, $identificador);

 redirect("../index.php?listaID=$identificador");
        ?>