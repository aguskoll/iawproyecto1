<!DOCTYPE HTML>
<html>

    <body>

        <?php

        function redirect($url) {
            header("Location: $url");
            die();
        }

        include_once('db.php');
        $bd = new Model();
        if (!isset($_GET['listaID'])) {
            $lista = uniqid();
            //generar un identificador unico para la nueva lista
            echo "<br> crear una nueva id"; //Esto es debug
        } else {
            $lista = filter_input(INPUT_GET, 'listaID', FILTER_SANITIZE_STRING);
            $notas = $bd->getNotas($lista);
            if ($notas == false || (count($notas) == 0)) {//asumo lista vacia como error, PREGUNTAR
                echo "<br> la url es invalida, no existe esa lista"; //esto es debug
                redirect("./");
            }
        }

        $notas = $bd->getNotas($lista);
        if ((count($notas) > 0)) {
            echo "<table border=1>";
            echo "<tr><td>Nota</td><td>Fecha</td><td>Orden</td></tr>";
        }
        foreach ($notas as $nota) {
            echo "<tr>";
            echo "<td>" . $nota['nota'] . "</td>";
            echo "<td>" . $nota['fecha'] . "</td>";
            echo "<td>" . $nota['orden'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>

    </body>

</html>
