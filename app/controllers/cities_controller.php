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
    
    /**
     * Default Layout
     * @var String  
     */
    protected $layout;
            
    /**
     * Create a new instance of CitiesController
     * @param String $layout - Default Layout
     */
    function __construct($layout = 'page') {
        $this->layout = Route::getLayoutPath($layout);
        session_start();
    }
    
    /**
     * Show all Cities
     */
    function index ($params) {
               
        $cities = City::getAll();
        
        if(isset($params['format']) && $params['format'] != "html" ) {
            $this->renderView("cities", "index", 'none', "Listing Cities", $cities, $params);
        } else {
            $this->renderView("cities", '', $this->layout, "Listing cities", $cities);
        }
        
    }
    
    /**
     * Create a new City
     */
    function create () {
        
        $params = array("departaments" => Departament::getAll());
        
        $this->renderView("cities", "new", $this->layout, "New City", null, $params);
        
    }
    
    /**
     * Edit a City
     * @param type $params
     */
    function edit ($params) {
        
        $params["departaments"] = Departament::getAll();
        
        $this->renderView("cities", "edit", $this->layout, "Edit City", null, $params);
    }
    
    /**
     * Insert a new City
     * @param type $code
     * @param type $name
     */
    function insert ($params) {
        
        if(!City::insert($params['city'])) {
            $_SESSION[ 'flash' ][ 'error' ] = "Could not be Insert.";
        } else {
            $_SESSION[ 'flash' ][ 'notice' ] = "City successfuly inserted!";
        }
               
        $cities = City::getAll();
        
        $this->renderView("cities", '', $this->layout, "Listing Cities", $cities, $params);
        
    }
    
    /**
     * Insert a new City
     * @param type $code
     * @param type $name
     */
    function update ($params) {
        
        if(!City::update($params['city']['id'], $params['city'])) {
            $_SESSION[ 'flash' ][ 'error' ] = "Could not be Update.";
        } else {
            $_SESSION[ 'flash' ][ 'notice' ] = "City successfuly updated!";
        }
               
        $cities = City::getAll();
        
        $this->renderView("cities", '', $this->layout, "Listing Cities", $cities, $params);

    }
    
    /**
     * Delete a city by your id
     * @param array $id
     */
    function delete ($params) {  
        
        if(!City::delete($params['id'])) {
            $_SESSION[ 'flash' ][ 'error' ] = "Could not be Delete.";
        } else {
            $_SESSION[ 'flash' ][ 'notice' ] = "City successfuly deleted!";
        }

        Route::redirectTo("cities");
        
    }
    
    /**
     * Search a city by your name
     * @param array $params
     */
    function search ($params) {
        
        $cities = City::search($params['key'], $params['value']);
            
        if($cities->count() > 0) {
            
            if($this->isAjax()) {
                $this->renderView("cities", "_cities", 'none', "Listing Cities", $cities);
            } else {
                $this->renderView("cities", $this->defaultView, $this->layout, "Listing Cities", $cities);
            }
            
        } else {
            
            $_SESSION[ 'flash' ][ 'error' ] = "No cities found.";
            
        }
        
    }

    /**
     * Show info about specific City
     * @param type $params
     */
    public function show($params) {
        
        $cities = City::show($params['id']);
            
        if(isset($params['format']) && $params['format'] != "html" ) {
            $this->renderView("cities", "index", 'none', "Listing Cities", $cities, $params);
        } else {
            $this->renderView("cities", "show", $this->layout, "Show City", $cities, $params);
        }
        
    }

}