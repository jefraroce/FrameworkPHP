<?php
/**
 * @author Jeisson Rosas
 */

class Db {
    
    var $db;
    var $dbname = 'prueba';
    var $dbhost = 'localhost:27017';
    
    function __construct() {
        
        $con = new MongoClient();    
        $this->db = $con->selectDB($this->dbname);

    }

    
    function getConDb() {
        return $this->db;
    }
        
}