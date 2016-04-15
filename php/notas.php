<?php


include_once('db.php');

$resultado = 0;
$funcion = 'redirect';

$bd = new Model('php');


if (isset($_GET['funcion'])) {
    $funcion = $_GET['funcion'];
}

switch ($funcion) {
    case 'marcarHecha':
        die();
        marcarHecha();
        break;/*
    case label2:
        code to be executed if n=label2;
        break;
    case label3:
        code to be executed if n=label3;
        break;
    ...
 */   default:
        die('default');
} 


function marcarHecha(){
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



?>
