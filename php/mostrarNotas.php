
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
<title> Tareas por hacer</title>

<!-- CSS   -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>



<div class="container"  >

 <div class="row">

        <?php

        function redirect($url) {
            header("Location: $url");
            die();
        }

        include_once('db.php');
        $bd = new Model();
           //!isset($_GET['listaID']) 
        if ($_GET['listaID']==='nueva') {
            $lista = uniqid();
            $bd->addListaID($lista);
            echo $lista; //Esto es debug
        } 
        else 
            {
            $lista = filter_input(INPUT_GET, 'listaID', FILTER_SANITIZE_STRING);

            if (!$bd->isValid($lista)) {
                
            //    redirect("index.php");
               
            }
          }

        $notas = $bd->getNotas($lista);
        if ((count($notas) > 0)) {
            echo "<table border=1>";
            echo "<tr><th>Nota</th><th>Link</th><th>Fecha</th></tr>";
        }
        
        foreach ($notas as $nota) {
            echo "<tr id= " . $nota['Id'] . ">";
            echo "<td>" . $nota['nota'] . "</td>";
            echo "<td>" . $nota['link'] . "</td>";
            echo "<td>" . $nota['fecha'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<br> Link para compartir esta lista: /index.php?listaID=$lista";
        ?>

    </div>
</div>

