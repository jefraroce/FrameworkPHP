<?php
/**
 * @author Jeisson Rosas
 */

class Db {
    
    var $con;
    var $dbname = 'prueba';
    var $dbhost = 'localhost:27017';
    
    /**
     * 
     * @param type $table
     */
    function __construct($table) {
        
        $con = new MongoClient();    
        $db = $con->selectDB($this->dbname);
        $this->con = $db->$table;

    }

    /**
     * Return all document's
     * @param String $sort
     * @return Iterator
     */
    function getAll($sort = 'name') {
        return $this->con->find()->sort(array($sort => 1));
    }
    
    /**
     * Insert a new document
     * @param array $object
     */
    function insert($object) {
        try {
            $this->con->insert($object, array("w" => 1));
            return true;
        } catch(MongoException $e) {
            echo "<br/><h6>Error: <br/>".$e."</h6>";
        }
        return false;
    }
    
    /**
     * 
     * @param type $id
     * @param type $object
     */
    function update($id, $object) {
        if($this->con->update(array('_id' => new MongoId($id)), $object)) {
            return true;
        }
        return false;
    }
    
    /**
     * 
     * @param type $id
     * @return boolean
     */
    function delete($id) {
        if($this->con->remove(array('_id' => new MongoId($id)), array("justOne" => true))) {
            return true;
        }
        return false;
    }

    /**
     * Search a country for a value
     * @param type $key
     * @param type $value
     * @return null
     */
    function search($key, $value, $sort = 'name') {
        if($result = $this->con->find(array($key => new MongoRegex("/$value/i")))->sort(array($sort => 1))) {
            return $result;
        }
        return null;
    }
    
    /**
     * 
     * @param type $filter
     * @return boolean
     */
    function show($id) {
        if($result = $this->con->find(array('_id' => new MongoId($id)))) {
            return $result;
        }
        return null;
    }
        
}