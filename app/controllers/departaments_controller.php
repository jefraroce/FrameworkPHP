<?php
/**
 * @autor Jeisson Rosas
 */

require_once 'config/routes.php';
require_once Route::getControllerPath("application");
require_once Route::getControllerPath("i");
require_once Route::getModelPath("departament");
require_once Route::getModelPath("country");
require_once Route::getHelperPath("departaments");

class DepartamentsController extends ApplicationController implements IController {
    
    function __construct() {}
    
    /**
     * Show all Departaments
     */
    function index () {
         //obtiene  los registros de la base de datos
        ob_start();     
        
        $pagina = $this->loadTemplate("Listing Departaments");
                       
        $departaments = Departament::getAll();
        if($departaments != '') {
            include Route::getViewPath("departaments", "departaments");//'app/views/departaments/departaments.php';
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
        
        $pagina = $this->loadTemplate("New Departament");     
        
        ob_start(); 
        
        $countries = Country::getAll();
        include Route::getViewPath("departaments", "new");//'app/views/departaments/new.php';
        $datos = ob_get_clean();
        $html = $datos;  
        
	$pagina = $this->replaceContent('/\#CONTENIDO\#/ms' , $html, $pagina);
        
	$this->viewPage($pagina);
    }
    
    /**
     * Edit a Departament
     */
    function edit ($params) {
        
        $pagina = $this->loadTemplate("Edit Departament"); 
        
        ob_start(); 
        $countries = Country::getAll();
        include Route::getViewPath("departaments", "edit");//'app/views/departaments/edit.php';
        $datos = ob_get_clean();
        $html = $datos;  
        
	$pagina = $this->replaceContent('/\#CONTENIDO\#/ms' , $html, $pagina);
        
	$this->viewPage($pagina);
    }
    
    /**
     * Insert a new Departament
     * @param type $code
     * @param type $name
     */
    function insert ($params) {
        //obtiene  los registros de la base de datos
        ob_start();     
        
        $pagina = $this->loadTemplate("Listing Departaments");
        
        if(!Departament::insert($params['departament']))
            echo "<h6>Error on Insert.</h6>";
               
        $departaments = Departament::getAll();
        if($departaments != '') {
            include Route::getViewPath("departaments", "departaments");//'app/views/departaments/departaments.php';
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
        
        $pagina = $this->loadTemplate("Listing Departaments");
        
        if(!Departament::update($params['id'], $params['departament']))
            echo "<h6>Error on Update.</h6>";
               
        $departaments = Departament::getAll();
        if($departaments != '') {
            include Route::getViewPath("departaments", "departaments");//'app/views/departaments/departaments.php';
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
        
        if(!Departament::delete($params['id']))
            echo "<h6>Error on Delete.</h6>";

        $departaments = Departament::getAll();
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
        
        $departaments = Departament::search($params['key'], $params['value']);
            
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
        
        $pagina = $this->loadTemplate("Show Departament");
        
        ob_start();
        
        $departaments = Departament::show($params['id']);
            
        if($departaments != '') {
            include Route::getViewPath("departaments", "show");//'app/views/departaments/show.php';
            $datos = ob_get_clean();
            $html = $datos;     
        }
        	
	$pagina = $this->replaceContent('/\#CONTENIDO\#/ms' , $html, $pagina);
	$this->viewPage($pagina);
        
    }

}