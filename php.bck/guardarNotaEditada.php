<?php
function redirect($url) {
    header("Location: $url");
    die();
}
include_once('db.php');

    $db = new Model('otro');
    $nota = $_POST['nota'];
    $link = $_POST['link'];
    $fecha = $_POST['fecha'];
    $notaID = $_POST['notaID'];
    $db->saveNota($nota, $link, $fecha, $notaID);
    $identificador = $db->getListaID($notaID);

 redirect("../index.php?listaID=$identificador");
        ?>