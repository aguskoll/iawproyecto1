
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
<title>Agregar tarea</title>

<!-- CSS   -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>


<div class="container">  
    <div class="row">	
        <?php
        $listaID = filter_input(INPUT_GET, 'listaID', FILTER_SANITIZE_STRING);
        ?>
        <form action="php/guardarNota.php" method="post" class="col s12">

            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">mode_edit</i>
                    <input type="text" name="nota"/>
                    <label for="tarea">Nota:</label>
                    <br>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">mode_edit</i>
                    <input  type="text" name="link"  >
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
            <input type="hidden" name="listaID" value="<?php echo htmlspecialchars($listaID); ?>"/>
           
            <input class="btn waves-effect waves-light" type="submit" name="action">
            <i class="material-icons ">send</i>
        

        </form>
    </div>
</div>


