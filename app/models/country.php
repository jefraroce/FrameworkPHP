<?php
/**
 * @autor Jeisson Rosas
 */

require_once 'config/db.php';

class Country extends Db {
        
    function __construct() {
        parent::__construct("countries");
    }
    
}