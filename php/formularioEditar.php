<div class="container">  
  <div class="valign-wrapper">
      <h4 class="valign">Edite una tarea</h4>
    </div>
    <div class="row">	
        <?php
            $notaID = filter_input(INPUT_GET, 'notaID', FILTER_SANITIZE_STRING);
            $nota = filter_input(INPUT_GET, 'nota', FILTER_SANITIZE_STRING);
            $link = filter_input(INPUT_GET, 'link', FILTER_SANITIZE_STRING);
            $fecha = filter_input(INPUT_GET, 'fecha', FILTER_SANITIZE_STRING);
        ?>
        <form action="php/notas.php" method="post" class="col s12" name="editarNota">

            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">mode_edit</i>
                    <input type="text" name="nota" value="<?php echo $nota; ?>">
                    <label for="tarea" class="active">Nota:</label>
                    <br>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">mode_edit</i>
                    <input  type="text" name="link"  value="<?php echo $link; ?>">
                    <label for="link" class="active">Link:</label>
                </div>
            </div>
            <div class="row">

                <div class="input-field col s6">

                    <i class="material-icons prefix right ">today</i> 
                    <label for="fecha">Fecha de entrega o finalizacion:</label><br>
                    <input type="date" class="datepicker" name="fecha" value="<?php echo $fecha; ?>">

                </div>
            </div>
            <input type="hidden" name="notaID" value="<?php echo htmlspecialchars($notaID); ?>">
            <input type="hidden" name="funcion" value="editar">
            <input class="btn waves-effect blue lighten-2" type="button" value="Editar" name="action" onclick="validar_nota_editada()">
            <!--i class="material-icons ">send</i!-->
        

        </form>
    </div>
</div>


