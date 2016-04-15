<?php


include_once('db.php');
$funcion = "redirect";
$bd = new Model('php');


if (isset($_GET['funcion'])) {
    $funcion = $_GET['funcion'];
}

if (isset($_POST['funcion'])) {
    $funcion = $_POST['funcion'];
}

switch ($funcion) {
    case "marcarHecha":
        marcarHecha($bd);
        break;
    case "borrarNota":
        borrarNota($bd);
        break;
    case "editar":
        editarNota($bd);
        break;
    case "guardar":
        guardarNota($bd);
        break;
    default:
        die('default');
} 

function editarNota($bd){
    $nota = $_POST['nota'];
    $link = $_POST['link'];
    $fecha = $_POST['fecha'];
    $notaID = $_POST['notaID'];
    $bd->saveNota($nota, $link, $fecha, $notaID);
    $identificador = $bd->getListaID($notaID);

    redirect("../index.php?listaID=$identificador");
}

function guardarNota($bd){
    $nota = $_POST['nota'];
    $link = $_POST['link'];
    $fecha = $_POST['fecha'];
    $identificador = $_POST['listaID'];
    $orden = ($bd->contar($identificador))+1;
    $bd->addNota($nota, $link, $fecha, $orden, $identificador);

    redirect("../index.php?listaID=$identificador");
}


function borrarNota($bd){
    $notaID='';
    $resultado = 0;
    if (isset($_GET['notaID'])) {
        $notaID = $_GET['notaID'];
        $resultado = $bd->deleteNota($notaID);
    }

    Header ( "Content-type: text/xml" ); 	
    echo "<resultado>";
    echo " <notaID>".$notaID."</notaID>";
    echo " <eliminado>".$resultado."</eliminado>";
    echo "</resultado>";
}

function marcarHecha($bd){
    $notaID='';
    $resultado = 0;
    if (isset($_GET['notaID'])) {
        $notaID = $_GET['notaID'];
        $resultado = $bd->marcarHecha($notaID);
    }

    Header ( "Content-type: text/xml" ); 	
    echo "<resultado>";
    echo " <notaID>".$notaID."</notaID>";
    echo " <check>".$resultado."</check>";
    echo "</resultado>";  
}

function redirect($url) {
    header("Location: $url");
    die();
}

?>
