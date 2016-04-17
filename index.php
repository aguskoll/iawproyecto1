<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title> Tareas por hacer</title>


    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen" />


</head>
<?php
    include_once('php/checkID.php'); 
?>


    <body onload="cargarTareas('<?php echo $url; ?>')">


        <ul id="slide-out" class="side-nav" onclick="boton_menu()">
            <li><a onclick="cargarTareasHoy('<?php echo $url; ?>')">Tareas de hoy</a></li>
            <li><a onclick="cargarTareasHechas('<?php echo $url; ?>')">Tareas hechas</a></li>

        </ul>
        <a href="#" data-activates="slide-out" class="button-collapse">
            <i class="mdi-navigation-menu"></i>
        </a>


        <div class="navbar-fixed ">
            <nav>
                <div class="nav-wrapper blue lighten-2">

                    <ul class="left hide-on-med-and-down">
                        <li>
                            <!--el boton para expandir el menu!-->
                            <a class="boton-transparente" onclick="boton_menu()">
                                <i class="material-icons left">list</i>
                            </a>
                        </li>
                        <li>
                            <!--el boton para cargar la lista de tareas!-->

                            <a class="boton-transparente" onclick="cargarTareas('<?php echo $url; ?>')">
                                <i class="material-icons left">store</i> Lista de tareas
                            </a>
                        </li>
                        <li> <a id="logo-container" class="brand-logo center">Organiza tu estudio</a>
                        </li>
                    </ul>

                    <ul class="right hide-on-med-and-down">
                        <!--boton para agreagar tarea!-->
                        <li>
                            <a class="boton-transparente" id="agregar_tarea" onclick="crearTarea('<?php echo $url; ?>')">
                                <i class="material-icons left">add</i> Agreagar tarea
                            </a>
                        </li>
                        <li>
                         <!--barra de busqueda!-->
                            <!--a href="sass.html"><i class="material-icons left">search</i>Buscar</a!-->
                         <form>
                             <div class="input-field">
                                 <input id="search" type="search" required>
                                 <label for="search"><i class="material-icons">search</i></label>
                                 <i class="material-icons">close</i>
                             </div>
                         </form>
                        
                        </li>

                    </ul>
                </div>
            </nav>
        </div>

        <main>
            <div id="cuerpo_principal" class="cuerpo">

            </div>

        </main>


        <footer class="page-footer fixed blue lighten-2  ">
            <!-- Modal Trigger -->
            <div  class="fixed-action-btn" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large modal-trigger waves-effect right waves-circle green lighten-1 darken-1 tooltipped" data-target="modal1" data-position="left" data-delay="50" data-tooltip="Compartir"><i class="material-icons">open_in_new</i></a>
            </div>
            <!-- Modal Structure -->
            <div id="modal1" class="modal">
                <div class="modal-content">
                    <h4>Compartir esta lista</h4>
                    <p>/index.php?listaID=<?php echo $url; ?></p>
                </div>
                <div class="modal-footer">
                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    Made by <a class="white-text text-lighten-3">Sebastian Larrieu y Agustin Koll  </a>
                </div>
            </div>
        </footer>
        <!--  Scripts-->
        <script src="js/jquery-2.2.3.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
        <script src="js/sidenav.js"></script>
        <script src="js/ajax.js"></script>
        <script src="js/funcionesNotas.js"></script>
        <script src="js/sorteable.js"></script>
    </body>



</html>
