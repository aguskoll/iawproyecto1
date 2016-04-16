 <?php

        function redirect($url) {
            header("Location: $url");
            die();
        }

        include_once('db.php');
        $bd = new Model('mostrar');
        $lista = filter_input(INPUT_GET, 'listaID', FILTER_SANITIZE_STRING);
        $notas = $bd->getNotas($lista,$hechas);
        $anterior='';
        $siguienteID=-1;
        $orden=0;
        $maximo=count($notas);
?>