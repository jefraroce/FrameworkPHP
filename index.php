<?php
/**
 * @autor Jeisson Rosas
 */

$params = $_REQUEST;

require_once 'config/routes.php';
require_once Route::getControllerPath(( (isset($params['controller']) && !empty($params['controller']) ) ? $params['controller'] : "countries" ));

$controllerClass = ( ( isset($params['controller']) && !empty($params['controller']) ) ? $params['controller'] : "Countries" )."Controller";

$controller = new $controllerClass();

$action = isset($params['action']) ? $params['action'] : "index" ;
    
if(!empty( $controller ) && method_exists( $controller, $action )) {

    $controller->$action($params);
    
} else {
    
    $controller->index();
    //echo phpinfo();
    
}
?>