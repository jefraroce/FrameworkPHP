<?php

class ApplicationController {
    
    /* METODO QUE CARGA LAS PARTES PRINCIPALES DE LA PAGINA WEB
	INPUT
		$title | titulo en string del header
	OUTPIT
		$pagina | string que contiene toda el cocigo HTML de la plantilla 
	*/
    protected function loadTemplate($title = 'Test Jeisson', $script = '') {
        $pagina = $this->loadPage('app/views/page.php');     
            
        $header = $this->loadPage('app/views/layouts/header.php');            
        $pagina = $this->replaceContent('/\#HEADER\#/ms', $header, $pagina);            
        $pagina = $this->replaceContent('/\#SCRIPTS\#/ms', $script, $pagina);
        $pagina = $this->replaceContent('/\#TITLE\#/ms', $title, $pagina);
            
        $footer = $this->loadPage('app/views/layouts/footer.php');
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
     * @param type $in
     * @param type $out
     * @param type $pagina
     * @return type
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

?>
