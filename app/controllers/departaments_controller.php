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
    
    /**
     * Default Layout
     * @var String  
     */
    protected $layout;
            
    /**
     * Create a new instance of DepartamentsController
     * @param String $layout Default Layout
     */
    function __construct($layout = 'page') {
        $this->layout = Route::getLayoutPath($layout);
    }
    
    /**
     * Show all Departaments
     */
    function index () {
                       
        $departaments = Departament::getAll();
        
        $this->renderView("departaments", '', $this->layout, "Listing Departaments", $departaments);
    }
    
    /**
     * Create a new Departament
     */
    function create () {
        
        $params = array("countries" => Country::getAll());
        
        $this->renderView("departaments", "new", $this->layout, "New Departament", null, $params);
        
    }
    
    /**
     * Edit a Departament
     */
    function edit ($params) {
        
        $params["countries"] = Country::getAll();
        
        $this->renderView("departaments", "edit", $this->layout, "Edit Departament", null, $params);
        
    }
    
    /**
     * Insert a new Departament
     * @param type $code
     * @param type $name
     */
    function insert ($params) {
        
        if(!Departament::insert($params['departament']))
            echo "<h6>Error on Insert.</h6>";
               
        $departaments = Departament::getAll();
        
        $this->renderView("departaments", '', $this->layout, "Listing Departaments", $departaments, $params);
        
    }
    
    /**
     * Insert a new Departament
     * @param type $code
     * @param type $name
     */
    function update ($params) {
        
        if(!Departament::update($params['id'], $params['departament']))
            echo "<h6>Error on Update.</h6>";
               
        $departaments = Departament::getAll();
        
        $this->renderView("departaments", '', $this->layout, "Listing Departaments", $departaments, $params);

    }
    
    /**
     * 
     * @param type $id
     */
    function delete ($params) {
        
        if(!Departament::delete($params['id']))
            echo "<h6>Error on Delete.</h6>";

        $departaments = Departament::getAll();
        
        if($departaments->count() > 0) {
            
            ob_start();
            paintRow($departaments);              
            $this->viewPage(ob_get_clean());
            
        } else {
            echo "<h6>No departaments found.</h6>";
        }
        
    }
    
    /**
     * 
     * @param type $params
     */
    function search ($params) {
        
        $departaments = Departament::search($params['key'], $params['value']);
            
        if($departaments->count() > 0) {
            
            ob_start();
            paintRow($departaments);         
            $this->viewPage(ob_get_clean());
            
        } else {
            echo "<h6>No departaments found.</h6>";
        }
        
    }

    /**
     * Show info about specific Departament
     * @param type $params
     */
    public function show($params) {
        
        $departaments = Departament::show($params['id']);
            
        $this->renderView("departaments", "show", $this->layout, "Show Departament", $departaments, $params);
        
    }

}