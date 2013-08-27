<?php
/**
 * @autor Jeisson Rosas
 */

require_once 'config/db.php';

class Departament {
    
    var $departaments;
    
    function __construct() {
        $conDb = new Db();
        $this->departaments = $conDb->getConDb()->departaments;
    }
    
    /**
     * Return the departaments collection.
     * @return type Departaments
     */
    function getDepartaments() {
        return $this->departaments->find()->sort(array('name' => 1));
    }
    
    /**
     * 
     * @param type $code
     * @param type $name
     * @param type $country_id
     * @return boolean
     */
    function insert($code, $name, $country_id) {
        try {
            $this->departaments->insert(array('code' => strtoupper($code), 'name' => $name, 'country_id' => $country_id), array("w" => 1));
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
     * @param type $country_id
     * @return boolean
     */
    function update($id, $code, $name, $country_id) {
        if($this->departaments->update(array('_id' => new MongoId($id)), array('code' => strtoupper($code), 'name' => $name, 'country_id' => $country_id))) {
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
        if($this->departaments->remove(array('_id' => new MongoId($id)), array("justOne" => true))) {
            return true;
        }
        return false;
    }
    
    /**
     * Search and return a departament with the value send.
     * @param type $key
     * @param type $value
     * @return null
     */
    function search($key, $value) {
        if($result = $this->departaments->find(array($key => new MongoRegex("/$value/i")))->sort(array('name' => 1))) {
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
        if($result = $this->departaments->find(array('_id' => new MongoId($id)))) {
            return $result;
        }
        return null;
    }
    
}
?>
