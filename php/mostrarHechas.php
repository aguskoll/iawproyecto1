<div class="container">
    <div class="valign-wrapper">
      <h4 class="valign">Tareas realizadas</h4>
    </div>

    <div class="row">

        <?php 
        $hechas=1;
        include_once('cargarNotas.php');?>
            <ul  class="collection" >

                <?php for ($i=0;$i<$maximo;$i++ ) { 
                    
                    $nota=$notas[$i];
                    ?>
                    <li class="collection-item avatar " id="<?php echo $nota['Id']; ?> ">
                        <i class="material-icons circle">description</i>
                        <span class="title ">Tarea: <?php echo $nota['nota'] ?> </span>
                        <p>
                            <?php echo 'Fecha de finalizacion: '.$nota['fecha'];  ?>
                        </p>
                        <p>
                            <?php echo 'Link: '.$nota['link'] ?>
                        </p>
                        <div class="secondary-content" >
                        

                            <a id="reestablecer" onclick="reestablecer('<?php echo $nota['Id']; ?>')" class="waves-effect  waves-circle blue lighten-2  btn-floating" title="reestablecer tarea">
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
  <!-- Compiled and minified JavaScript -->
  <script>
   $(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
  });
  </script>