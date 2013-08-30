<?php
/**
 * @autor Jeisson Rosas
 */

require_once 'config/db.php';

class Departament extends Db {
    
    function __construct() {
        parent::__construct("departaments");
    }
    
}
?>
