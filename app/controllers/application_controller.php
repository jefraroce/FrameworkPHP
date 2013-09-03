<?php

require_once 'config/routes.php';

class ApplicationController {
    
    protected $defaultView = "index";

    /**
     * Load and return a Template
     * @param String $title - Title of the page
     * @param String $script - Code script will be add to the page
     * @return page
     */
    protected function loadTemplate($title = 'Test Jeisson', $layout = '', $header = '') {
        
        if(!empty($layout))
            $pagina = $this->loadPage($layout);    
        else
            $pagina = $this->loadPage($this->layout);
            
        $header = $this->loadPage(Route::getLayoutPath("header"));            
        $pagina = $this->replaceContent('/\#HEADER\#/ms', $header, $pagina);            
        $pagina = $this->replaceContent('/\#TITLE\#/ms', $title, $pagina);
        
        $footer = $this->loadPage(Route::getLayoutPath("footer"));
        $pagina = $this->replaceContent('/\#FOOTER\#/ms', $footer, $pagina);				
            
        return $pagina;
    }
		
    /**
     * Load a page in the buffer.
     * @param String $page Path or Url to page
     * @param mixed $params Additional parameters
     * @return String - Buffer with the content of one page
     */
    protected function loadPage($page, $collection = null, $params = null) {
        
        ob_start();
        include $page;
        return ob_get_clean();
        
    }
    
    /**
     * Replace a string for other string on one page.
     * @param String $in
     * @param String $out
     * @param page $pagina
     * @return page
     */
    protected function replaceContent($in='/\#CONTENIDO\#/ms', $out, $pagina) {
        
        return preg_replace($in, $out, $pagina);
        
    }
    
    /* METODO QUE ESCRIBE EL CODIGO PARA QUE SEA VISTO POR EL USUARIO
		INPUT
		$html | codigo html
		OUTPUT
		HTML | codigo html		
	*/
     protected function viewPage($html) {
        
        echo $html;
        
    }
    
    /**
     * 
     * @param type $controller
     * @param type $view
     * @param type $layout
     * @param type $title
     * @param type $collection
     * @param type $params
     */
    protected function renderView($controller, $view = '', $layout = 'none', $title = 'Test FrameworkPHP', $collection = null, $params = array()) {
        
        $view = (empty($view) ? $this->defaultView : $view);
        
        $content = $this->loadPage(Route::getViewPath($controller, $view), $collection, $params);
        
        if( $layout != 'none') {
            
            $pagina = $this->replaceContent('/\#CONTENIDO\#/ms', $content, $this->loadTemplate($title, $layout));
            
        } else {
            
            $pagina = $content;
            
        }
        
	$this->viewPage($pagina);
        
    }
}