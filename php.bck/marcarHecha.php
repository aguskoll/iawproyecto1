<?php


include_once('db.php');

$resultado = 0;
$notaID = '';

if (isset($_GET['notaID'])) {
    $notaID = $_GET['notaID'];
    $bd = new Model('php');
    $resultado = $bd->marcarHecha($notaID);

}

Header ( "Content-type: text/xml" ); 	
echo "<resultado>";
echo " <notaID>".$notaID."</notaID>";
echo " <check>".$resultado."</check>";
echo "</resultado>";




?>