<?php
  /**
   * @autor Jeisson Rosas
   */
  $params = $_REQUEST;
  $controller = ( ( !isset( $params[ 'controller' ] ) || empty( $params[ 'controller' ] ) ) ? 'countries' : $params[ 'controller' ] );
  $action = ( ( !isset( $params[ 'action' ] ) || empty( $params[ 'action' ] ) ) ? 'index' : $params[ 'action' ] );
  $view = $action;
  
  require_once( 'config/routes.php' );
  require_once( Route::getControllerPath( $controller ) );
  
  $controllerClass = ucfirst( strtolower( $controller ) ) . 'Controller';
  $objController = new $controllerClass();
  
  if ( !empty( $objController ) && method_exists( $objController, $action ) ) {
    $objController->$action( $params );
  } else {
    $objController->index();
    //echo phpinfo();
  }
