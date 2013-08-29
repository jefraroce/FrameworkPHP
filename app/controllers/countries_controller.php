<?php
/**
 * @autor Jeisson Rosas
 */

require_once 'config/routes.php';
require_once Route::getControllerPath('application');
require_once Route::getControllerPath('i');
require_once Route::getModelPath('country');
require_once Route::getHelperPath('countries');

class CountriesController extends ApplicationController implements IController {
    
    function __construct() {}
    
    /**
     * Show all Countries
     */
    function index () {
         //obtiene  los registros de la base de datos
        ob_start();     
        
        $pagina = $this->loadTemplate("Listing Countries");
        
        $country = new Country();
               
        $countries = $country->getCountries();
        if($countries != '') {
            include Route::getViewPath("countries", "countries");//'app/views/countries/countries.php';
            $datos = ob_get_clean();
            $html = $datos;                
            
        }        				
		
	$pagina = $this->replaceContent('/\#CONTENIDO\#/ms' , $html, $pagina);
	$this->viewPage($pagina);
    }
    
    /**
     * Create a new Country
     */
    function create () {
        
        $pagina = $this->loadTemplate("New Country");
        
        ob_start(); 
        include Route::getViewPath("countries", "new");//'app/views/countries/new.php';
        $datos = ob_get_clean();
        $html = $datos;  
        
	$pagina = $this->replaceContent('/\#CONTENIDO\#/ms' , $html, $pagina);
        
	$this->viewPage($pagina);
    }
    
    /**
     * Edit a Country
     */
    function edit ($params) {
        
        $pagina = $this->loadTemplate("Edit Country");
        
        ob_start(); 
        include Route::getViewPath("countries", "edit");//'app/views/countries/edit.php';
        $datos = ob_get_clean();
        $html = $datos;  
        
	$pagina = $this->replaceContent('/\#CONTENIDO\#/ms' , $html, $pagina);
        
	$this->viewPage($pagina);
    }
    
    /**
     * Insert a new Country
     * @param type $code
     * @param type $name
     */
    function insert ($params) {
        //obtiene  los registros de la base de datos
        ob_start();     
        
        $pagina = $this->loadTemplate("Listing Countries");
        
        $country = new Country();
        
        if(!$country->insert($params['code'], $params['name']))
            echo "<h6>Error on Insert.</h6>";
               
        $countries = $country->getCountries();
        if($countries != '') {
            include Route::getViewPath("countries", "countries");//'app/views/countries/countries.php';
            $datos = ob_get_clean();
            $html = $datos;                
            
        }        				
		
	$pagina = $this->replaceContent('/\#CONTENIDO\#/ms' , $html, $pagina);
	$this->viewPage($pagina);
        
    }
    
    /**
     * Insert a new Country
     * @param type $code
     * @param type $name
     */
    function update ($params) {
        //obtiene  los registros de la base de datos
        ob_start();     
        
        $pagina = $this->loadTemplate("Listing Countries");
        
        $country = new Country();
        
        if(!$country->update($params['id'], $params['code'], $params['name']))
            echo "<h6>Error on Update.</h6>";
               
        $countries = $country->getCountries();
        if($countries != '') {
            include Route::getViewPath("countries", "countries");//'app/views/countries/countries.php';
            $datos = ob_get_clean();
            $html = $datos;                
            
        }        				
		
	$pagina = $this->replaceContent('/\#CONTENIDO\#/ms' , $html, $pagina);
	$this->viewPage($pagina);

    }
    
    /**
     * 
     * @param type $id
     */
    function delete ($params) {
        
        ob_start();
        
        $country = new Country();
        
        if(!$country->delete($params['id']))
            echo "<h6>Error on Delete.</h6>";

        $countries = $country->getCountries();
        if($countries != '') {
            paintRow($countries);
            $datos = ob_get_clean();
            $html = $datos;                
            $this->viewPage($html);
        }
        
    }
    
    /**
     * 
     * @param type $params
     */
    function search ($params) {

        $country = new Country();
        
        $countries = $country->search($params['key'], $params['value']);
            
        if($countries != '') {
            ob_start();
            paintRow($countries);
            $datos = ob_get_clean();
            $html = $datos;                
            $this->viewPage($html);
        } 
        
    }

    /**
     * Show info about specific Country
     * @param type $params
     */
    public function show($params) {
        
        $pagina = $this->loadTemplate("Show Country");
        
        ob_start();
        
        $country = new Country();
        
        $countries = $country->show($params['id']);
            
        if($countries != '') {
            include Route::getViewPath("countries", "show");//'app/views/countries/show.php';
            $datos = ob_get_clean();
            $html = $datos;     
        }
        	
	$pagina = $this->replaceContent('/\#CONTENIDO\#/ms' , $html, $pagina);
	$this->viewPage($pagina);
        
    }

}