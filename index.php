<?php
/**
 * @autor Jeisson Rosas
 */

include "app/controllers/".(isset($_REQUEST['controller']) ? $_REQUEST['controller'] : "countries" )."_controller.php";

$con_class = (isset($_REQUEST['controller']) ? $_REQUEST['controller'] : "countries" )."Controller";

$controller = new $con_class();

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "index" ;
    
if(isset($_REQUEST['controller']) && isset($_REQUEST['action'])) {

    $controller->$_REQUEST['action']($_REQUEST);
    
} else {
    
    $controller->index();
    //echo phpinfo();
    
}
?>