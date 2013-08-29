<?php

require_once 'config/routes.php';

class ApplicationController {
    
    /**
     * Load and return a Template
     * @param String $title - Title of the page
     * @param String $script - Code script will be add to the page
     * @return page
     */
    protected function loadTemplate($title = 'Test Jeisson', $script = '') {
        $pagina = $this->loadPage(Route::getLayoutPath('page'));     
            
        $header = $this->loadPage(Route::getLayoutPath("header"));            
        $pagina = $this->replaceContent('/\#HEADER\#/ms', $header, $pagina);            
        $pagina = $this->replaceContent('/\#SCRIPTS\#/ms', $script, $pagina);
        $pagina = $this->replaceContent('/\#TITLE\#/ms', $title, $pagina);
            
        $footer = $this->loadPage(Route::getLayoutPath("footer"));
        $pagina = $this->replaceContent('/\#FOOTER\#/ms', $footer, $pagina);				
            
        return $pagina;
    }
		
	/* METODO QUE CARGA UNA PAGINA DE LA SECCION VIEW Y LA MANTIENE EN MEMORIA
		INPUT
		$page | direccion de la pagina 
		OUTPUT
		STRING | devuelve un string con el codigo html cargado
	*/	
    protected function loadPage($page) {
        
        return file_get_contents($page);
        
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
}