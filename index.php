<?php
/**
 * @autor Jeisson Rosas
 */

require_once 'config/routes.php';
require_once Route::getControllerPath(( (isset($_REQUEST['controller']) && !empty($_REQUEST['controller']) ) ? $_REQUEST['controller'] : "countries" ));

$controllerClass = ( ( isset($_REQUEST['controller']) && !empty($_REQUEST['controller']) ) ? $_REQUEST['controller'] : "Countries" )."Controller";

$controller = new $controllerClass();

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "index" ;
    
if(!empty( $controller ) && method_exists( $controller, $action )) {

    $controller->$action($_REQUEST);
    
} else {
    
    $controller->index();
    //echo phpinfo();
    
}
?>