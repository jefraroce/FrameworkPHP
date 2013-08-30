<?php
/**
 * @autor Jeisson Rosas
 */

require_once 'config/db.php';

class Country extends Db {
    
    protected static $table_name = "countries";
    
    public static $table_schema = array(
     'id' => 0,
     'code' => '',
     'name' => ''
    );
    
}