<div class="container">  
   <div class="valign-wrapper">
      <h4 class="valign">Agregue una tarea</h4>
    </div>
    <div class="row">	
        <?php
        $listaID = filter_input(INPUT_GET, 'listaID', FILTER_SANITIZE_STRING);
        ?>
        <form action="php/notas.php" method="post" class="col s12" name="crearNota">

            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">mode_edit</i>
                    <input type="text" name="nota">
                    <label for="tarea">Nota:</label>
                    <br>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">mode_edit</i>
                    <input  type="text" name="link">
                    <label for="link">Link:</label>
                </div>
            </div>
            <div class="row">

                <div class="input-field col s6">

                    <i class="material-icons prefix right ">today</i>
                    <label for="fecha">Fecha de entrega o finalizacion:</label><br>
                    <input type="date" class="datepicker" name="fecha">

                </div>
            </div>
            <input type="hidden" name="listaID" value="<?php echo htmlspecialchars($listaID); ?>">
            <input type="hidden" name="funcion" value="guardar">
            <input class="btn waves-effect blue lighten-2" type="button" value="Crear" name="action" onclick="validar_nota_nueva()">
            <!--i class="material-icons ">send</i!-->
        

        </form>
    </div>
</div>