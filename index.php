<?php
/**
 * @autor Jeisson Rosas
 */

$params = $_REQUEST;
$controller = ( (isset($params['controller']) && !empty($params['controller']) ) ? $params['controller'] : "countries" );
$action = isset($params['action']) ? $params['action'] : "index" ;

require_once 'config/routes.php';
require_once Route::getControllerPath($controller);

$controllerClass = $controller."Controller";

$controllerObj = new $controllerClass();

$params['format'] = (isset($params['format']) && $params['format'] == 'php' ? 'html' : $params['format']);

if(!empty( $controllerObj ) && method_exists( $controllerObj, $action )) {

    $controllerObj->$action($params);
    
} else {
    
    $controllerObj->index();
    
}