<!DOCTYPE HTML>
<html>
<body>
<?php
    $listaID = filter_input(INPUT_GET, 'listaID', FILTER_SANITIZE_STRING);
    $orden = filter_input(INPUT_GET, 'orden', FILTER_SANITIZE_STRING);
?>
<form action="guardarNota.php" method="post">
Nota <input type="text" name="nota"/><br>
Fecha <input type="text" name="fecha"/><br>
<input type="hidden" name="orden" value='<?php echo htmlspecialchars($orden); ?>'/>
<input type="hidden" name="listaID" value='<?php echo htmlspecialchars($listaID); ?>'/>
<input type="hidden" name="nueva" value="si"/>
<input type="submit">
</form>

</body>
</html>
