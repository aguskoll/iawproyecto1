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
            $bd->addListaID($lista);
            echo "<br> crear una nueva id"; //Esto es debug
        } else {
            $lista = filter_input(INPUT_GET, 'listaID', FILTER_SANITIZE_STRING);
            
            if (!$bd->isValid($lista)) {
                //puedo llevar a una un mensaje de error
                redirect("./");
            }
        }

        $notas = $bd->getNotas($lista);
        if ((count($notas) > 0)) {
            echo "<table border=1>";
            echo "<tr><th>Nota</th><th>Fecha</th><th>Orden</th></tr>";
        }
        $ultima=0;
        foreach ($notas as $nota) {
            echo "<tr id= " . $nota['Id'] . ">";
            echo "<td>" . $nota['nota'] . "</td>";
            echo "<td>" . $nota['fecha'] . "</td>";
            echo "<td>" . $nota['orden'] . "</td>";
            echo "</tr>";
            $ultima= $nota['orden']+1;
        }
        echo "</table>";
        echo "<br><a href=./formularioAgregar.php?listaID=$lista&orden=$ultima> agregar nota</a>";
        echo "<br> Link para compartir esta lista: /index.php?listaID=$lista";
        ?>
    </body>

</html>

