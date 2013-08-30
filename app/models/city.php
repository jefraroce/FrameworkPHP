<?php
/**
 * @autor Jeisson Rosas
 */

require_once 'config/db.php';

class City extends Db {
    
    function __construct() {
        parent::__construct("cities");
    }
    
}
?>
