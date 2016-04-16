<?php

class Model {
    # @object, base de datos
    private $db;

    #Creo el objeto bd y la tabla si no existe
    public function __construct($path) {
        try {
            //Creo conexion a bd y las tablas
            $this->connect($path);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

            $query = "CREATE TABLE IF NOT EXISTS todo (Id INTEGER PRIMARY KEY, nota TEXT, link TEXT, fecha DATE, orden INTEGER, hecha INTEGER, url TEXT)";
            $this->db->exec($query);
            
            #tabla para ids validas
            $query = "CREATE TABLE IF NOT EXISTS listas (listaID TEXT PRIMARY KEY)";
            $this->db->exec($query);
        } catch (PDOException $e) {
            die('Database error: ' . $e->getMessage());
        }
    }

    #Genera la conexion a la bd
    private function connect($path) {
        try {
            if($path === "index"){
            $this->db = new PDO('sqlite:php/materiasDB.sqlite');
            }else{
                $this->db = new PDO('sqlite:materiasDB.sqlite');
            }
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }

    #Agrega una nueva nota
    public function addNota($nota, $link, $fecha, $orden, $url) {
        $query = "INSERT INTO todo (nota, link, fecha, orden, hecha, url) VALUES('$nota', '$link', '$fecha', $orden, 0, '$url')";
        $this->db->exec($query);
    }

    #Marcar nota como hecha
    public function marcarHecha($notaID) {
        $query = "UPDATE todo SET hecha = 1 WHERE Id = '$notaID'";
        return $this->db->exec($query);
    }
    
    #Agrega un nuevo identificador de lista
    public function addListaID($listaID) {
        $query = "INSERT INTO listas VALUES ('$listaID')";
        $this->db->exec($query);
    }
    
    #Retorna true si la lista esta presente en la bd
    public function isValid($listaID) {
        $tmp = $this->db->query("SELECT * FROM listas WHERE listaID = '$listaID'")->fetchAll();
        return count($tmp) > 0;
    }
    
    #Retorna las notas correspondients a la lista dada que no figuran como hechas
    public function getNotas($listaID, $hechas) {
        return $this->db->query("SELECT Id, nota, link, fecha, orden FROM todo WHERE url = '$listaID' AND hecha = $hechas ORDER BY orden ASC")->fetchAll();
    }
    
    #Retorna las notas correspondients a una fecha
    public function getNotasFecha($listaID, $date) {
        return $this->db->query("SELECT Id, nota, link, fecha, orden FROM todo WHERE url = '$listaID' AND fecha = '$date'")->fetchAll();
    }
    
    #Cuenta las notas presentes en una lista
    public function contar($listaID){
        $tmp = $this->db->query("SELECT Id FROM todo WHERE url = '$listaID' AND hecha = 0 ")->fetchAll();
        return count($tmp);
        
    }
    
    #Borra la nota identificada
    public function deleteNota($notaID) {
        return $this->db->exec("DELETE FROM todo WHERE Id='$notaID'");
    }
    
    #Borra la nota identificada
    public function getListaID($notaID) {
        $val= $this->db->query("SELECT url FROM todo WHERE Id='$notaID'")->fetch();
        return $val['url'];
    }
    
    #Actualizar los valores de una nota
    public function saveNota($nota, $link, $fecha, $notaID) {
            $query = "UPDATE todo SET nota='$nota', link='$link', fecha='$fecha' WHERE Id = '$notaID'";
            $this->db->exec($query);
    }
    
   public function swap($notaID,$notaIDanterior,$ordenNuevo,$ordenViejo){
    $query = "UPDATE todo SET orden=$ordenViejo WHERE Id ='$notaIDanterior'";
    $this->db->exec($query);
        
    $query2 = "UPDATE todo SET orden=$ordenNuevo WHERE Id = '$notaID'";
    return  $this->db->exec($query2);
        
    }
    
   public function reestablecer($notaID){
       $query = "UPDATE todo SET hecha = 0 WHERE Id = '$notaID'";
        return $this->db->exec($query);
       
   }

}

?>
