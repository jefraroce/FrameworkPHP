<?php
/**
 * @autor Jeisson Rosas
 */
require_once 'app/controllers/application_controller.php';
require_once 'app/controllers/icontroller.php';
require_once 'app/models/departament.php';
require_once 'app/models/country.php';
require_once "app/helpers/departaments_helper.php";

class DepartamentsController extends ApplicationController implements IController {
    
    var $script = "<script type=\"text/javascript\" src=\"app/assets/js/departaments.js\"></script>";
    
    function __construct() {}
    
    /**
     * Show all Departaments
     */
    function index () {
         //obtiene  los registros de la base de datos
        ob_start();     
        
        $pagina = $this->loadTemplate("Listing Departaments", $this->script);
        
        $departament = new Departament();
               
        $departaments = $departament->getDepartaments();
        if($departaments != '') {
            include 'app/views/departaments/departaments.php';
            $datos = ob_get_clean();
            $html = $datos;                
            
        }        				
		
	$pagina = $this->replaceContent('/\#CONTENIDO\#/ms' , $html, $pagina);
	$this->viewPage($pagina);
    }
    
    /**
     * Create a new Departament
     */
    function create () {
        
        $pagina = $this->loadTemplate("New Departament", $this->script);
        
        $tmp = new Country();       
        
        ob_start(); 
        $countries = $tmp->getCountries();
        include 'app/views/departaments/new.php';
        $datos = ob_get_clean();
        $html = $datos;  
        
	$pagina = $this->replaceContent('/\#CONTENIDO\#/ms' , $html, $pagina);
        
	$this->viewPage($pagina);
    }
    
    /**
     * Edit a Departament
     */
    function edit ($params) {
        
        //$pagina = $this->loadTemplate("Edit Departament", $this->script);
        $tmp = new Country();        
        
        ob_start(); 
        $countries = $tmp->getCountries();
        include 'app/views/departaments/edit.php';
        $datos = ob_get_clean();
        $html = $datos;  
        
	//$pagina = $this->replaceContent('/\#CONTENIDO\#/ms' , $html, $pagina);
        
	$this->viewPage($html);
    }
    
    /**
     * Insert a new Departament
     * @param type $code
     * @param type $name
     */
    function insert ($params) {
        //obtiene  los registros de la base de datos
        ob_start();     
        
        $pagina = $this->loadTemplate("Listing Departaments", $this->script);
        
        $departament = new Departament();
        
        if(!$departament->insert($params['code'], $params['name'], $params['country_id']))
            echo "<h6>Error on Insert.</h6>";
               
        $departaments = $departament->getDepartaments();
        if($departaments != '') {
            include 'app/views/departaments/departaments.php';
            $datos = ob_get_clean();
            $html = $datos;                
            
        }        				
		
	$pagina = $this->replaceContent('/\#CONTENIDO\#/ms' , $html, $pagina);
	$this->viewPage($pagina);
        
    }
    
    /**
     * Insert a new Departament
     * @param type $code
     * @param type $name
     */
    function update ($params) {
        //obtiene  los registros de la base de datos
        ob_start();     
        
        $pagina = $this->loadTemplate("Listing Departaments", $this->script);
        
        $departament = new Departament();
        
        if(!$departament->update($params['id'], $params['code'], $params['name'], $params['country_id']))
            echo "<h6>Error on Update.</h6>";
               
        $departaments = $departament->getDepartaments();
        if($departaments != '') {
            include 'app/views/departaments/departaments.php';
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
        
        $departament = new Departament();
        
        if(!$departament->delete($params['id']))
            echo "<h6>Error on Delete.</h6>";

        $departaments = $departament->getDepartaments();
        if($departaments != '') {
            paintRow($departaments);
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
        
        $departament = new Departament();
        
        $departaments = $departament->search($params['key'], $params['value']);
            
        if($departaments != '') {
            paintRow($departaments);
            $datos = ob_get_clean();
            $html = $datos;                
            $this->viewPage($html);
        }
        
    }

    /**
     * Show info about specific Departament
     * @param type $params
     */
    public function show($params) {
        
        $pagina = $this->loadTemplate("Show Departament", $this->script);
        
        ob_start();
        
        $departament = new Departament();
        
        $departaments = $departament->show($params['id']);
            
        if($departaments != '') {
            include 'app/views/departaments/show.php';
            $datos = ob_get_clean();
            $html = $datos;     
        }
        	
	$pagina = $this->replaceContent('/\#CONTENIDO\#/ms' , $html, $pagina);
	$this->viewPage($pagina);
        
    }

}
?>
