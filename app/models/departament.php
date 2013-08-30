<?php
/**
 * @autor Jeisson Rosas
 */

require_once 'config/db.php';

class Departament extends Db {
    
    protected static $table_name = "departaments";
    
    protected static $table_schema = array(
     'id' => 0,
     'code' => '',
     'name' => '',
     'country_id' => ''
    );
    
}