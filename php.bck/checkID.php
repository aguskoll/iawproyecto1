<?php
include_once('php/db.php');    
function redirect($url) {
    header("Location: $url");
    die();
}
    $bd = new Model('index');  
    
   if (!isset($_GET['listaID'])) {
    $url =  uniqid();
    $bd->addListaID($url);
   }else{
       $url =$_GET['listaID'];
       if (!$bd->isValid($url)) {
            redirect("./index.php");
        }
     }
?>