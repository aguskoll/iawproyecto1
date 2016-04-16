<?php

        function redirect($url) {
            header("Location: $url");
            die();
        }
        
        include_once('db.php');
        $bd = new Model('mostrar');
        $lista = filter_input(INPUT_GET, 'listaID', FILTER_SANITIZE_STRING);
        
        if($hechas==2){
            $date = date("Y-m-d");
            $notas = $bd->getNotasFecha($lista,$date);
        }else{
            $notas = $bd->getNotas($lista,$hechas);
        }
        
        $anterior='';
        $siguienteID=-1;
        $orden=0;
        $maximo=count($notas);
        
?>
