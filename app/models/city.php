<?php
/**
 * @autor Jeisson Rosas
 */

require_once 'config/db.php';

class City {
    
    var $cities;
    
    function __construct() {
        $conDb = new Db();
        $this->cities = $conDb->getConDb()->cities;
    }
    
    /**
     * Return the cities collection.
     * @return type Cities
     */
    function getCities() {
        return $this->cities->find()->sort(array('name' => 1));
    }
    
    /**
     * Insert a new city
     * @param type $code
     * @param type $name
     * @param type $depart_id
     * @return boolean
     */
    function insert($code, $name, $depart_id) {
        try {
            $this->cities->insert(array('code' => strtoupper($code), 'name' => $name, 'depart_id' => $depart_id), array("w" => 1));
            return true;
        } catch(MongoException $e) {
            echo "<h6>Error: <br/>".$e."</h6>";
        }
        return false;
    }
    
    /**
     * 
     * @param type $id
     * @param type $code
     * @param type $name
     * @param type $depart_id
     * @return boolean
     */
    function update($id, $code, $name, $depart_id) {
        if($this->cities->update(array('_id' => new MongoId($id)), array('code' => strtoupper($code), 'name' => $name, 'depart_id' => $depart_id))) {
            return true;
        }
        return false;
    }
    
    /**
     * Delete a city by your id
     * @param type $id
     * @return boolean
     */
    function delete($id) {
        if($this->cities->remove(array('_id' => new MongoId($id)), array("justOne" => true))) {
            return true;
        }
        return false;
    }
    
    /**
     * Search and return a city with the value send.
     * @param type $key
     * @param type $value
     * @return null
     */
    function search($key, $value) {
        if($result = $this->cities->find(array($key => new MongoRegex("/$value/i")))->sort(array('name' => 1))) {
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
        if($result = $this->cities->find(array('_id' => new MongoId($id)))) {
            return $result;
        }
        return null;
    }
    
}
?>
