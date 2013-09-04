<?php
/**
 * @author Jeisson Rosas
 */

class Db {
    
    private static $con = null;
    private static $dbname = 'prueba';
    private static $dbhost = 'localhost:27017';
    
    private static function getCon() {
        if( self::$con == null ) {
            $con = new MongoClient("mongodb://".self::$dbhost);   
            self::$con = $con->selectCollection(self::$dbname, static::$table_name);            
        }
        return self::$con;
    }
    
    /**
     * Return all document's
     * @param String $sort
     * @return Iterator
     */
    public static function getAll($sort = 'name') {
        return self::getCon()->find()->sort(array($sort => 1));
    }
    
    /**
     * Insert a new document
     * @param array $object
     */
    public static function insert($object) {
        try {
            self::getCon()->insert($object, array("w" => 1));
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
    public static function update($id, $object) {
        unset($object['id']);
        if(self::getCon()->update(array('_id' => new MongoId($id)), $object)) {
            return true;
        }
        return false;
    }
    
    /**
     * 
     * @param type $id
     * @return boolean
     */
    public static function delete($id) {
        $result = self::getCon()->remove(array('_idddd' => $id), array("justOne" => true, "w" => 1));
        if($result['err'] != null) {
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
    public static function search($key, $value, $sort = 'name') {
        if($result = self::getCon()->find(array($key => new MongoRegex("/$value/i")))->sort(array($sort => 1))) {
            return $result;
        }
        return null;
    }
    
    /**
     * 
     * @param type $filter
     * @return boolean
     */
    public static function show($id) {
        if($result = self::getCon()->find(array('_id' => new MongoId($id)))) {
            return $result;
        }
        return null;
    }
        
}