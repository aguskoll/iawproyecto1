<div class="container" id="sortable">

    <div class="row" id="sortable">

        <?php

        function redirect($url) {
            header("Location: $url");
            die();
        }

        include_once('db.php');
        $bd = new Model('mostrar');
        $lista = filter_input(INPUT_GET, 'listaID', FILTER_SANITIZE_STRING);
        $notas = $bd->getNotas($lista,1);
      
        $maximo=count($notas);
        ?>
            <ul  class="collection" >

                <?php for ($i=0;$i<$maximo;$i++ ) { 
                    
                    $nota=$notas[$i];
                    ?>
                    <li class="collection-item avatar " id="<?php echo $nota['Id']; ?> ">
                        <i class="material-icons circle">comment</i>
                        <span class="title ">Tarea: <?php echo $nota['nota'] ?> </span>
                        <p>
                            <?php echo 'Fecha de finalizacion: '.$nota['fecha'];  ?>
                        </p>
                        <p>
                            <?php echo 'Link: '.$nota['link'] ?>
                        </p>
                        <div class="secondary-content">
                        

                            <a onclick="reestablecer('<?php echo $nota['Id']; ?>')" class="waves-effect  waves-circle blue lighten-2  btn-floating" >
                                <i class="material-icons">restore </i>
                            </a>
                           
                          
                        </div>
                    </li>
                    <?php
                    
                }
                ?>

            </ul>
    </div>
</div>

    <!--?php if($siguiente===null){
                             echo -1; }else{ echo $siguiente['Id']; }?>