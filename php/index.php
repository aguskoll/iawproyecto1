<!DOCTYPE HTML>
<html>
<body>

Mostrar las notas <br>
<?php
    include_once('db.php');
    $bd = new Model();
    $bd->addNota("seba", "manana", 33,0,"l2");
    $notas = $bd->getNotas("l2");
    echo "<table border=1>";
    echo "<tr><td>Nota</td><td>Fecha</td><td>Orden</td></tr>";
 
    foreach ($notas as $nota) {
       echo "<tr>";
       echo "<td>".$nota['nota']."</td>";
       echo "<td>".$nota['fecha']."</td>";
       echo "<td>".$nota['orden']."</td>";
       echo "</tr>";
       }
       echo "</table>";

?>
    
</body>
</html>
