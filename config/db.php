<?php

//include 'config/config.php';

class Db {
    
    var $db;
    var $dbname = 'prueba';
    var $dbhost = 'localhost:28017';
    
    function __construct() {
        
        $con = new MongoClient();    
        $this->db = $con->selectDB($this->dbname);

    }

    
    function getConDb() {
        return $this->db;
    }
        
}

?>
