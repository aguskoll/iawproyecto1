<!DOCTYPE HTML>
<html>

<body>

    <?php
    include_once('db.php');
    $bd = new Model();
    if(!isset($_GET['listaID'])){
        //generar un identificador de lista con la php session
        echo "<br> crear una nueva id";
    }else{
        $lista=$_GET["listaID"];
       
        //$bd->addNota("seba", "manana", 33,0,"l2");
        $notas = $bd->getNotas($lista);
        if($notas == false || (count($notas) > 0)){
            echo "<br> la url es invalida, no existe esa lista";
        }else{
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
        }
    }
    ?>

</body>

</html>
