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
    }
    
    /**
     * Show all Cities
     */
    function index () {
               
        $cities = City::getAll();
        
        $this->renderView("cities", '', $this->layout, "Listing cities", $cities);
        
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
        
        if(!City::insert($params['city']))
            echo "<h6>Error on Insert.</h6>";
               
        $cities = City::getAll();
        
        $this->renderView("cities", '', $this->layout, "Listing Cities", $cities, $params);
        
    }
    
    /**
     * Insert a new City
     * @param type $code
     * @param type $name
     */
    function update ($params) {
        
        if(!City::update($params['city']['id'], $params['city']))
            echo "<h6>Error on Update.</h6>";
               
        $cities = City::getAll();
        
        $this->renderView("cities", '', $this->layout, "Listing Cities", $cities, $params);

    }
    
    /**
     * Delete a city by your id
     * @param array $id
     */
    function delete ($params) {       
        
        if(!City::delete($params['id']))
            echo "<h6>Error on Delete.</h6>";

        $cities = City::getAll();
        
        if($cities->count() > 0) {
            
            ob_start();
            paintRow($cities);              
            $this->viewPage(ob_get_clean());
            
        } else {
            echo "<h6>No cities found.</h6>";
        }
        
    }
    
    /**
     * Search a city by your name
     * @param array $params
     */
    function search ($params) {
        
        $cities = City::search($params['key'], $params['value']);
            
        if($cities->count() > 0) {
            
            ob_start();
            paintRow($cities);
            $this->viewPage(ob_get_clean());
            
        } else {
            echo "<h6>No cities found.</h6>";
        }
        
    }

    /**
     * Show info about specific City
     * @param type $params
     */
    public function show($params) {
        
        $cities = City::show($params['id']);
            
        $this->renderView("cities", "show", $this->layout, "Show City", $cities, $params);
        
    }

}