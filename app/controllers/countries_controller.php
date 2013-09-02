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
    
    /**
     * Default Layout
     * @var String  
     */
    protected $layout;
            
    /**
     * Create a new instance of CountriesController
     * @param String $layout - Default Layout
     */
    function __construct($layout = 'page') {
        $this->layout = Route::getLayoutPath($layout);
    }
    
    /**
     * Show all Countries
     */
    function index () { 
        
        $countries = Country::getAll();
        
        $this->renderView("countries", $this->defaultView, $this->layout, "Listing Countries", $countries);
        
    }
    
    /**
     * Create a new Country
     */
    function create () {
        
        $this->renderView("countries", "new", $this->layout, "New Country");
     
    }
    
    /**
     * Edit a Country
     * @param array $params
     */
    function edit ($params) {
        
        $this->renderView("countries", "edit", $this->layout, "Edit Country", null, $params);
        
    }
    
    /**
     * Insert a new Country
     * @param array $params
     */
    function insert ($params) {
        
        if(!Country::insert($params['country']))
            echo "<h6>Error on Insert.</h6>";
               
        $countries = Country::getAll();
        
        $this->renderView("countries", $this->defaultView, $this->layout, "Listing Countries", $countries);
        
    }
    
    /**
     * Insert a new Country
     * @param array $params Parameters
     */
    function update ($params) {
        
        if(!Country::update($params['country']['id'], $params['country']))
            echo "<h6>Error on Update.</h6>";
               
        $countries = Country::getAll();
        
        $this->renderView("countries", $this->defaultView, $this->layout, "Listing Countries", $countries);

    }
    
    /**
     * 
     * @param array $params Parameters
     */
    function delete ($params) {
        
        if(!Country::delete($params['id']))
            echo "<h6>Error on Delete.</h6>";

        $countries = Country::getAll();
        
        if($countries->count() > 0) {
            
            ob_start();
            paintRow($countries);        
            $this->viewPage(ob_get_clean());
            
        } else {
            echo "<h6>No countries found.</h6>";
        }
        
    }
    
    /**
     * 
     * @param array $params
     */
    function search ($params) {
        
        $countries = Country::search($params['key'], $params['value']);
        
        if($countries->count() > 0) {
            
            ob_start();
            paintRow($countries);
            $this->viewPage(ob_get_clean());
            
        } else {
            echo "<h6>No countries found.</h6>";
        }
        
    }

    /**
     * Show info about specific Country
     * @param array $params
     */
    public function show($params) {
        
        $countries = Country::show($params['id']);
        
        $this->renderView("countries", "show", $this->layout, "Show Country", $countries);
        
    }

}