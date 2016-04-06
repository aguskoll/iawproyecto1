 <?php  
class Model {
        # @object, data base
    private $db;

    # @bool ,  Connected to the database
    private $dbConnected = false;

    public function __construct() {
        try {
            //Creo conexion a bd y las tablas
            $this->Connect();
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            
            $query = "CREATE TABLE IF NOT EXISTS todo (Id INTEGER PRIMARY KEY, nota TEXT, fecha TEXT, orden INTEGER, hecha INTEGER, url TEXT)";
            $this->db->exec($query);

        }catch(PDOException $e) {
            die('Database error: ' . $e->getMessage());
        }
    }
    
       private function connect(){
        try {
            $this->db = new PDO('sqlite:materiasDB.sqlite');
            $this->dbConnected = true;
         }catch(PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }
    
    public function addNota($nota, $fecha, $orden,$hecha, $url){
        $query = "INSERT INTO todo (nota, fecha, orden, hecha, url) VALUES('$nota', '$fecha', $orden, $hecha, '$url')";
        $this->db->exec($query);
    }
    
    //Retorna las notas correspondients a la url dada
    public function getNotas($url){
        return $this->db->query("SELECT nota, fecha, orden FROM todo WHERE url = '$url' ORDER BY orden ASC")->fetchAll();
    }
}
    
?>
