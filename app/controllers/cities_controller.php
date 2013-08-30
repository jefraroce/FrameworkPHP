<?php
/**
 * @autor Jeisson Rosas
 */

require_once 'config/routes.php';
require_once Route::getControllerPath("application");
require_once Route::getControllerPath("i");
require_once Route::getModelPath("city");
require_once Route::getModelPath("departament");
require_once Route::getHelperPath("cities");

class CitiesController extends ApplicationController implements IController {
    
    function __construct() {}
    
    /**
     * Show all Cities
     */
    function index () {
         //obtiene  los registros de la base de datos
        ob_start();     
        
        $pagina = $this->loadTemplate("Listing Cities");
               
        $cities = City::getAll();
        if($cities != '') {
            include Route::getViewPath("cities", "cities");//'app/views/cities/cities.php';
            $datos = ob_get_clean();
            $html = $datos;                
            
        }        				
		
	$pagina = $this->replaceContent('/\#CONTENIDO\#/ms' , $html, $pagina);
	$this->viewPage($pagina);
    }
    
    /**
     * Create a new City
     */
    function create () {
        
        $pagina = $this->loadTemplate("New City");
        
        ob_start(); 
        $departaments = Departament::getAll();
        include Route::getViewPath("cities", "new");//'app/views/cities/new.php';
        $datos = ob_get_clean();
        $html = $datos;  
        
	$pagina = $this->replaceContent('/\#CONTENIDO\#/ms' , $html, $pagina);
        
	$this->viewPage($pagina);
    }
    
    /**
     * Edit a City
     */
    function edit ($params) {
        
        $pagina = $this->loadTemplate("Edit City");
        
        ob_start(); 
        $departaments = Departament::getAll();
        include Route::getViewPath("cities", "edit");//'app/views/cities/edit.php';
        $datos = ob_get_clean();
        $html = $datos;  
        
	$pagina = $this->replaceContent('/\#CONTENIDO\#/ms' , $html, $pagina);
        
	$this->viewPage($pagina);
    }
    
    /**
     * Insert a new City
     * @param type $code
     * @param type $name
     */
    function insert ($params) {
        //obtiene  los registros de la base de datos
        ob_start();     
        
        $pagina = $this->loadTemplate("Listing Cities");
        
        if(!City::insert($params['city']))
            echo "<h6>Error on Insert.</h6>";
               
        $cities = City::getAll();
        if($cities != '') {
            include Route::getViewPath("cities", "cities");//'app/views/cities/cities.php';
            $datos = ob_get_clean();
            $html = $datos;                
            
        }        				
		
	$pagina = $this->replaceContent('/\#CONTENIDO\#/ms' , $html, $pagina);
	$this->viewPage($pagina);
        
    }
    
    /**
     * Insert a new City
     * @param type $code
     * @param type $name
     */
    function update ($params) {
        //obtiene  los registros de la base de datos
        ob_start();     
        
        $pagina = $this->loadTemplate("Listing Cities");
        
        if(!City::update($params['city']['id'], $params['city']))
            echo "<h6>Error on Update.</h6>";
               
        $cities = City::getAll();
        if($cities != '') {
            include Route::getViewPath("cities", "cities");//'app/views/cities/cities.php';
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
        
        if(!City::delete($params['id']))
            echo "<h6>Error on Delete.</h6>";

        $cities = City::getAll();
        if($cities != '') {
            paintRow($cities);
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
        
        ob_start();
        
        $cities = City::search($params['key'], $params['value']);
            
        if($cities != '') {
            paintRow($cities);
            $datos = ob_get_clean();
            $html = $datos;                
            $this->viewPage($html);
        }
        
    }

    /**
     * Show info about specific City
     * @param type $params
     */
    public function show($params) {
        
        $pagina = $this->loadTemplate("Show City");
        
        ob_start();
        
        $cities = City::show($params['id']);
            
        if($cities != '') {
            include Route::getViewPath("cities", "show");//'app/views/cities/show.php';
            $datos = ob_get_clean();
            $html = $datos;     
        }
        	
	$pagina = $this->replaceContent('/\#CONTENIDO\#/ms' , $html, $pagina);
	$this->viewPage($pagina);
        
    }

}