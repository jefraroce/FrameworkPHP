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
        session_start();
    }
    
    /**
     * Show all Departaments
     */
    function index ($params) {
                       
        $departaments = Departament::getAll();
        
        if(isset($params['format']) && $params['format'] != "html" ) {
            if($params['format'] == "json") {
                header( 'Content-type: application/json' );
            } else if ($params['format'] == "xml") {
                header( 'Content-type: application/xml' );
            } else if ($params['format'] == "js") {
               header( 'Content-type: application/javascript' );
            }
            $this->renderView("departaments", "index", 'none', "Listing Departaments", $departaments, $params);
        } else {
            $this->renderView("departaments", '', $this->layout, "Listing Departaments", $departaments);
        }
        
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
        
        if(!Departament::insert($params['departament'])) {
            $_SESSION[ 'flash' ][ 'error' ] = "Could not be Inserted.";
        } else {
            $_SESSION[ 'flash' ][ 'notice' ] = "Departament successfuly inserted!";
        }
               
        $departaments = Departament::getAll();
        
        $this->renderView("departaments", '', $this->layout, "Listing Departaments", $departaments, $params);
        
    }
    
    /**
     * Insert a new Departament
     * @param type $code
     * @param type $name
     */
    function update ($params) {
        
        if(!Departament::update($params['id'], $params['departament'])) {
            $_SESSION[ 'flash' ][ 'error' ] = "Could not be Updated.";
        } else {
            $_SESSION[ 'flash' ][ 'notice' ] = "Departament successfuly updated!";
        }
               
        $departaments = Departament::getAll();
        
        $this->renderView("departaments", '', $this->layout, "Listing Departaments", $departaments, $params);

    }
    
    /**
     * 
     * @param type $id
     */
    function delete ($params) {
        
        if(!Departament::delete($params['id'])) {
            $_SESSION[ 'flash' ][ 'error' ] = "Could not be Deleted.";
        } else {
            $_SESSION[ 'flash' ][ 'notice' ] = "Departament successfuly deleted!";
        }

        Route::redirectTo("departaments");
        
    }
    
    /**
     * 
     * @param type $params
     */
    function search ($params) {
        
        $departaments = Departament::search($params['key'], $params['value']);
            
        if($departaments->count() > 0) {
            
            if($this->isAjax()) {
                $this->renderView("departaments", "_departaments", 'none', "Listing Departaments", $departaments);
            } else {
                $this->renderView("departaments", $this->defaultView, $this->layout, "Listing Departaments", $departaments);
            }
                        
        } else {
            
            $_SESSION[ 'flash' ][ 'error' ] = "No departaments found.";
            
        }
        
    }

    /**
     * Show info about specific Departament
     * @param type $params
     */
    public function show($params) {
        
        $departaments = Departament::show($params['id']);
            
        if(isset($params['format']) && $params['format'] != "html" ) {
            if($params['format'] == "json") {
                header( 'Content-type: application/json' );
            } else if ($params['format'] == "xml") {
                header( 'Content-type: application/xml' );
            } else if ($params['format'] == "js") {
               header( 'Content-type: application/javascript' );
            }
            $this->renderView("departaments", "index", 'none', "Listing Departaments", $departaments, $params);
        } else {
            $this->renderView("departaments", "show", $this->layout, "Show Departament", $departaments, $params);
        }
        
    }

}