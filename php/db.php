<?php

class Model {
    # @object, base de datos
    private $db;

    # @bool ,  conectado a la bd
    private $dbConnected = false;

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
            $this->dbConnected = true;
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }

    #Agrega una nueva nota
    public function addNota($nota, $link, $fecha, $orden, $url) {
        if (!$this->dbConnected) {
            $this->connect();
        }
        if($link != null){
            $query = "INSERT INTO todo (nota, link, fecha, orden, hecha, url) VALUES('$nota', '$link', '$fecha', $orden, 0, '$url')";
        }else{
            $query = "INSERT INTO todo (nota, fecha, orden, hecha, url) VALUES('$nota', '$fecha', $orden, 0, '$url')";
        }
        
        $this->db->exec($query);
    }

        #Marcar nota como hecha
    public function marcarHecha($listaID) {
        if (!$this->dbConnected) {
            $this->connect();
        }
            $query = "UPDATE todo SET hecha = 1 WHERE listaID = '$listaID'";
        $this->db->exec($query);
    }
    
    #Agrega un nuevo identificador de lista
    public function addListaID($listaID) {
        if (!$this->dbConnected) {
            $this->connect();
        }
        $query = "INSERT INTO listas VALUES ('$listaID')";
        $this->db->exec($query);
    }
    
    #Retorna true si la lista esta presente en la bd
    public function isValid($listaID) {
        if (!$this->dbConnected) {
            $this->connect();
        }
        $tmp = $this->db->query("SELECT * FROM listas WHERE listaID = '$listaID'")->fetchAll();
        return count($tmp) > 0;
    }
    
    #Retorna las notas correspondients a la lista dada que no figuran como hechas
    public function getNotas($listaID) {
        if (!$this->dbConnected) {
            $this->connect();
        }
        return $this->db->query("SELECT Id, nota, link, fecha, orden FROM todo WHERE url = '$listaID' AND hecha = 0 ORDER BY orden ASC")->fetchAll();
    }
    
     #Retorna las notas correspondients a la lista dada que figuran como hechas
        public function getNotasHechas($listaID) {
        if (!$this->dbConnected) {
            $this->connect();
        }
        return $this->db->query("SELECT Id, nota, link, fecha, orden FROM todo WHERE url = '$listaID' AND hecha = 1 ORDER BY orden ASC")->fetchAll();
    }
    
    public function contar($listaID){
         if (!$this->dbConnected) {
            $this->connect();
        }
        $tmp = $this->db->query("SELECT Id FROM todo WHERE url = '$listaID' AND hecha = 0 ")->fetchAll();
        return count($tmp);
        
    }
    public function deleteNota($notaID) {
        if (!$this->dbConnected) {
            $this->connect();
        }
        return $this->db->exec("DELETE FROM todo WHERE Id='$notaID'");
    }

}

?>
