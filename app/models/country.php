<?php
/**
 * @autor Jeisson Rosas
 */

require_once 'config/db.php';

class Country {
    
    var $countries;
    
    function __construct() {
        $conDb = new Db();
        $this->countries = $conDb->getConDb()->countries;
    }
    
    /**
     * Return the countries collection.
     * @return type Countries
     */
    function getCountries() {
        return $this->countries->find()->sort(array('name' => 1));
    }
    
    /**
     * 
     * @param type $code
     * @param type $name
     * @return boolean
     */
    function insert($code, $name) {
        try {
            $this->countries->insert(array('code' => strtoupper($code), 'name' => $name), array("w" => 1));
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
     */
    function update($id, $code, $name) {
        if($this->countries->update(array('_id' => new MongoId($id)), array('code' => strtoupper($code), 'name' => $name))) {
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
        if($this->countries->remove(array('_id' => new MongoId($id)), array("justOne" => true))) {
            return true;
        }
        return false;
    }
    
    /**
     * 
     * @param type $filter
     * @return boolean
     */
    function search($name) {
        if($result = $this->countries->find(array('name' => new MongoRegex("/$name/i")))->sort(array('name' => 1))) {
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
        if($result = $this->countries->find(array('_id' => new MongoId($id)))) {
            return $result;
        }
        return null;
    }
    
}
?>
