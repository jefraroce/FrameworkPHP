<?php
/**
 * @autor Jeisson Rosas
 */

require_once 'app/controllers/application_controller.php';
require_once 'app/controllers/icontroller.php';
require_once 'app/models/departament.php';
require_once 'app/models/city.php';
require_once "app/helpers/cities_helper.php";

class CitiesController extends ApplicationController implements IController {
    
    var $script = "<script type=\"text/javascript\" src=\"app/assets/js/cities.js\"></script>";
    
    function __construct() {}
    
    /**
     * Show all Cities
     */
    function index () {
         //obtiene  los registros de la base de datos
        ob_start();     
        
        $pagina = $this->loadTemplate("Listing Cities", $this->script);
        
        $city = new City();
               
        $cities = $city->getCities();
        if($cities != '') {
            include 'app/views/cities/cities.php';
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
        
        $pagina = $this->loadTemplate("New City", $this->script);
        
        $tmp = new Departament();       
        
        ob_start(); 
        $departaments = $tmp->getDepartaments();
        include 'app/views/cities/new.php';
        $datos = ob_get_clean();
        $html = $datos;  
        
	$pagina = $this->replaceContent('/\#CONTENIDO\#/ms' , $html, $pagina);
        
	$this->viewPage($pagina);
    }
    
    /**
     * Edit a City
     */
    function edit ($params) {
        
        //$pagina = $this->loadTemplate("Edit City", $this->script);
        $tmp = new Departament();        
        
        ob_start(); 
        $departaments = $tmp->getDepartaments();
        include 'app/views/cities/edit.php';
        $datos = ob_get_clean();
        $html = $datos;  
        
	//$pagina = $this->replaceContent('/\#CONTENIDO\#/ms' , $html, $pagina);
        
	$this->viewPage($html);
    }
    
    /**
     * Insert a new City
     * @param type $code
     * @param type $name
     */
    function insert ($params) {
        //obtiene  los registros de la base de datos
        ob_start();     
        
        $pagina = $this->loadTemplate("Listing Cities", $this->script);
        
        $city = new City();
        
        if(!$city->insert($params['code'], $params['name'], $params['depart_id']))
            echo "<h6>Error on Insert.</h6>";
               
        $cities = $city->getCities();
        if($cities != '') {
            include 'app/views/cities/cities.php';
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
        
        $pagina = $this->loadTemplate("Listing Cities", $this->script);
        
        $city = new City();
        
        if(!$city->update($params['id'], $params['code'], $params['name'], $params['depart_id']))
            echo "<h6>Error on Update.</h6>";
               
        $cities = $city->getCities();
        if($cities != '') {
            include 'app/views/cities/cities.php';
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
        
        $city = new City();
        
        if(!$city->delete($params['id']))
            echo "<h6>Error on Delete.</h6>";

        $cities = $city->getCities();
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
        
        $city = new City();
        
        $cities = $city->search($params['key'], $params['value']);
            
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
        
        $pagina = $this->loadTemplate("Show City", $this->script);
        
        ob_start();
        
        $city = new City();
        
        $cities = $city->show($params['id']);
            
        if($cities != '') {
            include 'app/views/cities/show.php';
            $datos = ob_get_clean();
            $html = $datos;     
        }
        	
	$pagina = $this->replaceContent('/\#CONTENIDO\#/ms' , $html, $pagina);
	$this->viewPage($pagina);
        
    }

}
?>
