<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title> Tareas por hacer</title>


        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
  <?php
   if (!isset($_GET['listaID'])) {
               
                         //$url ='nueva';
                          include_once('php/db.php');
                           $bd = new Model();   
                          $url =  uniqid();
                             $bd->addListaID($url);
                    }
                    else{
                        //agregar chequeo
                         $url =$_GET['listaID'];
                    }
               ?>  


    <body onload="cargarTareas('<?php echo $url; ?>')">
 


        <ul id="slide-out" class="side-nav" onclick="boton_menu()">
            <li><a href="#!">Tareas de hoy</a></li>
            <li><a href="#!">Tareas archivadas</a></li>
        </ul>
        <a href="#" data-activates="slide-out" class="button-collapse">
            <i class="mdi-navigation-menu"></i>
        </a>


        <div  class="navbar-fixed">
            <nav>
                <div class="nav-wrapper">
                   <ul class="left hide-on-med-and-down">
                       <li>
                           <!--el boton para expandir el menu!-->
                           <a class="boton-transparente" onclick="boton_menu()">
                            <i class="material-icons left">list</i>
                        </a>
                         </li>
                         <li>
                             <!--el boton para cargar la lista de tareas!-->
                             
                             <a class="boton-transparente"  onclick="cargarTareas('<?php echo $url; ?>')">
                                <i class="material-icons left">store</i> Lista de tareas
                            </a>
                         </li>
                      </ul>         
                    <ul class="right hide-on-med-and-down">
                        <!--boton para agreagar tarea!-->
                      <li>
                        <a class="boton-transparente" id="agregar_tarea"  onclick="crearTarea('<?php echo $url; ?>')">
                            <i class="material-icons left">add</i>
                            Agreagar tarea
                         </a> 
                      </li>
                        <li><a href="sass.html"><i class="material-icons left">search</i>Buscar</a></li>
                        
                    </ul>
                     <ul>  
                        <li>
                           <!--futura barra  !--> 
                        </li> 
                     </ul>
                </div>
            </nav>
        </div>
       
          
         <div id="cuerpo_principal" >
            
         </div>
          
             
        
           
                
          
        <!--!>
        onload="cargarTareas('<?php echo $url; ?>')"  <script type="javascript" src="js/ajax.js" >
                    cargarTareas('<?php echo $url; ?>');    
             </script>
         
        <div id="cuerpo_principal" onload="cargarTareas(<?php echo $url; ?>)"> </div>
        pie de pagina
        <--->
        <footer class="page-footer "  >
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text"></h5>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    Made by <a class="orange-text text-lighten-3">Sebastian Larrieu y Agustin Koll  </a>
                </div>
            </div>
        </footer>




        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
        <script src="js/sidenav.js"></script>
        <script src="js/ajax.js"></script>
       
    </body>
</html>