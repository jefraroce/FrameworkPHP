<?php
/**
 * @autor Jeisson Rosas
 */

require_once 'config/db.php';

class City extends Db {
    
    protected static $table_name = "cities";
    
    public static $table_schema = array(
     'id' => 0,
     'code' => '',
     'name' => '',
     'depart_id' => ''
    );
    
}