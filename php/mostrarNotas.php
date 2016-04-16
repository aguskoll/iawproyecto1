<div class="container">

    <div class="row">

 <?php

        function redirect($url) {
            header("Location: $url");
            die();
        }

        include_once('db.php');
        $bd = new Model('mostrar');
        $lista = filter_input(INPUT_GET, 'listaID', FILTER_SANITIZE_STRING);
        $notas = $bd->getNotas($lista,0);
        $anterior='';
        $siguienteID=-1;
        $orden=0;
        $maximo=count($notas);
        ?>
            <ul  class="collection" >

                <?php for ($i=0;$i<$maximo;$i++ ) { 
                    if($orden<($maximo-1))
                    {  
                        $notaSiguiente=$notas[$orden+1];
                        $siguienteID=$notaSiguiente['Id']; 
                    }
                    else{ $siguienteID=-1;}
                    $nota=$notas[$i];
                    ?>
                    <li class="collection-item avatar" id="<?php echo $nota['Id']; ?>">
                        <i class="material-icons circle">comment</i>
                        <span class="title">Tarea: <?php echo $nota['nota'] ?> </span>
                        <p>
                            <?php echo 'Fecha de finalizacion: '.$nota['fecha'].' orden '.$nota['orden'];  ?>
                        </p>
                        <p>
                            <?php echo 'Link: ' . $nota['link'] ?>
                        </p>
                        <div class="secondary-content">
                            <a onclick="borrarNota('<?php echo $nota['Id']; ?>')" class="waves-effect blue lighten-2 btn-floating">
                                <i class="material-icons">delete</i>
                            </a>
                            <a onclick="cargarEditarNota('<?php echo $nota['Id']; ?>','<?php echo $nota['nota'] ?>','<?php echo $nota['link'] ?>','<?php echo $nota['fecha'] ?>')" class="waves-effect  waves-circle blue lighten-2  btn-floating">
                                <i class="material-icons">mode_edit </i>
                            </a>

                            <a onclick="marcarHecha('<?php echo $nota['Id']; ?>')" class="waves-effect  waves-circle blue lighten-2  btn-floating" >
                                <i class="material-icons">done </i>
                            </a>
                            
                            <a onclick="subirNota('<?php echo $nota['Id']; ?>','<?php echo $orden; ?>','<?php echo $anterior; ?>','<?php echo $lista; ?>')" class="waves-effect  waves-circle blue lighten-2  btn-floating" >
                                <i >&uarr; </i>
                            </a>
                             <a onclick="bajarNota('<?php echo $nota['Id']; ?>','<?php echo $orden; ?>','<?php echo $siguienteID; ?>','<?php echo $lista; ?>')" class="waves-effect  waves-circle blue lighten-2  btn-floating" >
                                <i >&darr; </i>
                            </a>
                        </div>
                    </li>
                    <?php
                     $orden= ($orden)+1;
                    $anterior=$nota['Id'];
                }
                ?>


            </ul>
            <br> Link para compartir esta lista: </br>
            <?php echo "/index.php?listaID=$lista"; ?>
    </div>
</div>
