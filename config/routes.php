<?php
/**
 * @author Jeisson Rosas
 */

class Route {

    /**
     * Separator for dir's and files
     */
    const PATH_SEPARATOR = "/";
    
    /**
     * Separator for url's
     */
    const URL_SEPARATOR = "/";
    
    /**
     * Return route absolute to Root Path
     * @return String Path
     */
    public static function getRootPath() {
        return dirname( dirname(  __FILE__  ) ).self::PATH_SEPARATOR;
    }
    
    /**
     * Return route absolute to App Path
     * @return String Path
     */
    public static function getAppPath() {
        return self::getRootPath()."app".self::PATH_SEPARATOR;
    }
    
    /**
     * Return route absolute to a Controller or Controllers Path
     * @param String $controller - name of the controller
     * @return String Path
     */
    public static function getControllerPath($controller = "") {
        if($controller == "") {
            return self::getAppPath()."controllers".self::PATH_SEPARATOR;
        } else {
            return self::getAppPath()."controllers".self::PATH_SEPARATOR.$controller."_controller.php";
        }
    }
    
    /**
     * Return route absolute to one View. 
     * If the param controller is empty return route absolute to the directory views.
     * If the param view is empty return route absolute to the directory views of the controller. Example views/users
     * @param String $controller - name of the controller
     * @param String $view - name of the view
     * @return String Path
     */
    public static function getViewPath($controller = "", $view = "") {
        if($controller == "") {
            return self::getAppPath()."views".self::PATH_SEPARATOR;
        } else if ($view == "") {
            return self::getAppPath()."views".self::PATH_SEPARATOR.$controller.self::PATH_SEPARATOR;
        } else {
            return self::getAppPath()."views".self::PATH_SEPARATOR.$controller.self::PATH_SEPARATOR.$view.".html.php";
        }
    }
    
    /**
     * Return route absolute to a Model
     * @param String $model - name of the model
     * @return String Path
     */
    public static function getModelPath($model = "") {
        if($model == "") {
            return self::getAppPath()."models".self::PATH_SEPARATOR;
        } else {
            return self::getAppPath()."models".self::PATH_SEPARATOR.$model.".php";
        }
    }
    
    /**
     * Return route absolute to a Helper
     * @param String $helper - name of the helper
     * @return String Path
     */
    public static function getHelperPath($helper = "") {
        if($helper == "") {
            return self::getAppPath()."helpers".self::PATH_SEPARATOR;
        } else {
            return self::getAppPath()."helpers".self::PATH_SEPARATOR.$helper."_helper.php";
        }
    }
    
    /**
     * Return route absolute to a Layout
     * @param String $layout - name of the layout
     * @return String
     */
    public static function getLayoutPath($layout = "") {
        if($layout == "") {
            return self::getViewPath()."layouts".self::PATH_SEPARATOR;
        } else {
            return self::getViewPath()."layouts".self::PATH_SEPARATOR.$layout.".html.php";
        }
    }
    
    /**
     * 
     * @param type $asset
     * @return type
     */
    public static function getAssetsPath( $asset = '' ) {
      if ( empty( $asset ) ) {
        return self::getAppPath().'assets'.self::PATH_SEPARATOR;
      } else {
        return self::getAppPath().'assets'. self::PATH_SEPARATOR.$asset.self::PATH_SEPARATOR;
      }
    }
       
    /**
     * Return route absolute to a Layout
     * @param String $layout - name of the layout
     * @return String
     */
    public static function getJavaScriptPath($javaScript = "") {
        if($javaScript == "") {
            return self::getAssetsPath("js");
        } else {
            return self::getAssetsPath("js").$javaScript.".js";
        }
    }
    
    /**
     * 
     * @param String $stylesheet
     * @return String
     */
    public static function getStyleSheetPath( $stylesheet = '' ) {
        if ( empty( $stylesheet ) ) {
            return self::getAssetsPath( 'css' );
        } else {
            return self::getAssetsPath( 'css' ) . $stylesheet . ".css";
        }
    }
    
     /**
     * Return current URL
     * @param Boolean $root - if you want just the base URL
     * @return String
     **/
    public static function getCurrentUrl( $root = false ) {
      $scheme = ( isset( $_SERVER[ 'HTTPS' ] ) && $_SERVER[ 'HTTPS' ] == 'on' ) ? 'https://' : 'http://';
      $domain = $_SERVER[ 'SERVER_NAME' ];
      $port = ( $_SERVER[ 'SERVER_PORT' ] != '80' ) ? ( ':' . $_SERVER[ 'SERVER_PORT' ] ) : '';
      $currentUrl = $scheme . $domain . $port;
      $currentUrl .= ( ( $root === true ) ? dirname( $_SERVER[ 'SCRIPT_NAME' ] ) : $_SERVER[ 'REQUEST_URI' ] );
      
      return( $currentUrl );
    }
    
    /**
     * Return URL based on the "controller", "action" and "params"
     * @param String $controller - Controller
     * @param String $action - Action
     * @param String $params - Parameters
     * @return String
     **/
    public static function getUrlFor( $controller, $action = '', $params = array() ) {
      $url = ( self::getCurrentUrl( true ).self::PATH_SEPARATOR );
      
      if ( !empty( $controller ) ) { $url .= '?controller=' . $controller; }
      if ( !empty( $action ) ) { $url .= ( ( strpos( $url, '?' ) === false ) ? '?' : '&' ) . 'action=' . $action; }
      if ( $params != null ) { 
          foreach ($params as $key=>$value) {
            $url .= ( ( strpos( $url, '?' ) === false ) ? '?' : '&' ) . $key."=".$value; 
          }
      }
      
      return( $url );
    } 
    
    /**
     * Return url to a file javascript
     * @param String $javascript - name of the javascript
     * @return String
     */
    public static function getJavaScriptUrl($javaScript = "") {
        if($javaScript == "") {
            return self::getCurrentUrl( true ).self::URL_SEPARATOR."app".self::URL_SEPARATOR."assets".self::URL_SEPARATOR."js".self::URL_SEPARATOR;
        } else {
            return self::getCurrentUrl( true ).self::URL_SEPARATOR."app".self::URL_SEPARATOR."assets".self::URL_SEPARATOR."js".self::URL_SEPARATOR.$javaScript.".js";
        }
    }
    
    /**
     * Return url to a file css
     * @param String $stylesheet
     * @return String
     */
    public static function getStyleSheetUrl( $stylesheet = '' ) {
        if ( empty( $stylesheet ) ) {
            return self::getCurrentUrl( true ).self::URL_SEPARATOR."app".self::URL_SEPARATOR."assets".self::URL_SEPARATOR."css".self::URL_SEPARATOR;
        } else {
            return self::getCurrentUrl( true ).self::URL_SEPARATOR."app".self::URL_SEPARATOR."assets".self::URL_SEPARATOR."css".self::URL_SEPARATOR. $stylesheet . ".css";
        }
    }
    
    /**
     * Return url to one specific image
     * @param String $image
     * @return String - url to the image
     */
    public static function getImageUrl( $image ) {        
      $url = self::getCurrentUrl( true ).self::URL_SEPARATOR."app".self::URL_SEPARATOR."assets".self::URL_SEPARATOR."images".self::URL_SEPARATOR.$image;
      
      return( $url );      
    } 
     
}