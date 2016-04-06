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

        }catch(PDOException $e) {
            die('Database error: ' . $e->getMessage());
        }
    }
    
    #Genera la conexion a la bd
    private function connect(){
        try {
            $this->db = new PDO('sqlite:materiasDB.sqlite');
            $this->dbConnected = true;
         }catch(PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }
    
    #Agrega una nueva nota
    public function addNota($nota, $fecha, $orden,$hecha, $url){
        if(!$dbConnected){
            $this->connect();
        }
        $query = "INSERT INTO todo (nota, fecha, orden, hecha, url) VALUES('$nota', '$fecha', $orden, $hecha, '$url')";
        $this->db->exec($query);
    }
    
    //Retorna las notas correspondients a la url dada
    public function getNotas($url){
        if(!$dbConnected){
            $this->connect();
        }
        return $this->db->query("SELECT nota, fecha, orden FROM todo WHERE url = '$url' ORDER BY orden ASC")->fetchAll();
    }
}
    
?>
