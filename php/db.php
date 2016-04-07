<?php

class Model {
    # @object, base de datos

    private $db;

    # @bool ,  conectado a la bd
    private $dbConnected = false;

    #Creo el objeto bd y la tabla si no existe

    public function __construct() {
        try {
            //Creo conexion a bd y las tablas
            $this->connect();
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

            $query = "CREATE TABLE IF NOT EXISTS todo (Id INTEGER PRIMARY KEY, nota TEXT, fecha TEXT, orden INTEGER, hecha INTEGER, url TEXT)";
            $this->db->exec($query);
            
            #tabla para ids validas
            $query = "CREATE TABLE IF NOT EXISTS listas (listaID TEXT PRIMARY KEY)";
            $this->db->exec($query);
        } catch (PDOException $e) {
            die('Database error: ' . $e->getMessage());
        }
    }

    #Genera la conexion a la bd

    private function connect() {
        try {
            $this->db = new PDO('sqlite:materiasDB.sqlite');
            $this->dbConnected = true;
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }

    #Agrega una nueva nota
    public function addNota($nota, $fecha, $orden, $hecha, $url) {
        if (!$this->dbConnected) {
            $this->connect();
        }
        $query = "INSERT INTO todo (nota, fecha, orden, hecha, url) VALUES('$nota', '$fecha', $orden, $hecha, '$url')";
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
    
    #Retorna las notas correspondients a la lista dada
    public function getNotas($listaID) {
        if (!$this->dbConnected) {
            $this->connect();
        }
        return $this->db->query("SELECT Id, nota, fecha, orden FROM todo WHERE url = '$listaID' ORDER BY orden ASC")->fetchAll();
    }

}

?>
