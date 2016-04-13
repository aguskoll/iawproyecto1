
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
        $bd = new Model('mostrar');
        $ultima = 0 ;
        $lista = filter_input(INPUT_GET, 'listaID', FILTER_SANITIZE_STRING);

        $notas = $bd->getNotas($lista);
        ?>

        <ul class="collection">
            <?php foreach ($notas as $nota) { ?>
                <ul class="collection">
                    <li class="collection-item avatar" id="<?php echo $nota['Id']; ?>">
                        <i class="material-icons circle">comment</i>
                        <span class="title">Tarea: <?php echo $nota['nota'] ?> </span>
                        <p><?php echo 'Fecha de finalizacion: ' . $nota['fecha'] . ' Prioridad: ' . $ultima ?></p>
                        <p><?php echo 'Link: ' . $nota['link'] ?></p>
                        <div class="secondary-content">
                            <a onclick="borrarNota('<?php echo $nota['Id']; ?>')"  class="waves-effect waves-circle blue lighten-2  btn-floating">
                                <i class="material-icons">delete</i>
                            </a>
                            <a onclick=""  class="waves-effect  waves-circle blue lighten-2  btn-floating">
                                <i class="material-icons" >mode_edit </i>
                            </a>
                            <!--a onclick=""  class="waves-effect waves-light btn">
                                <i class="material-icons" >mode_edit </i>
                                </a--!>
                            <!--i class="material-icons">grade</i!-->
                        </div>
                    </li>
                    <?php
                    $ultima ++;
                }
                ?>




                <br> Link para compartir esta lista: </br> <?php echo "/index.php?listaID=$lista"; ?>
            </ul>   
    </div>
</div>

