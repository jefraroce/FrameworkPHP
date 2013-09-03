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
        session_start();
    }
    
    /**
     * Show all Countries
     */
    function index ($params) { 
        
        $countries = Country::getAll();
        
        if(isset($params['format']) && $params['format'] != "html" ) {            
            $this->renderView("countries", "index", 'none', "Listing Countries", $countries, $params);
        } else {
            $this->renderView("countries", $this->defaultView, $this->layout, "Listing Countries", $countries);
        }
        
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
        
        if(!Country::insert($params['country'])) {
            $_SESSION[ 'flash' ][ 'error' ] = "Could not be Inserted.";
        } else {
            $_SESSION[ 'flash' ][ 'notice' ] = "Country successfuly inserted!";
        }
               
        $countries = Country::getAll();
        
        $this->renderView("countries", $this->defaultView, $this->layout, "Listing Countries", $countries);
        
    }
    
    /**
     * Insert a new Country
     * @param array $params Parameters
     */
    function update ($params) {
        
        if(!Country::update($params['country']['id'], $params['country'])) {
            $_SESSION[ 'flash' ][ 'error' ] = "Could not be Updated.";
        } else {
            $_SESSION[ 'flash' ][ 'notice' ] = "Country successfuly updated!";
        }
               
        $countries = Country::getAll();
        
        $this->renderView("countries", $this->defaultView, $this->layout, "Listing Countries", $countries);

    }
    
    /**
     * 
     * @param array $params Parameters
     */
    function delete ($params) {
        
        if(!Country::delete($params['id'])) {
            $_SESSION[ 'flash' ][ 'error' ] = "Could not be Deleted.";
        } else {
            $_SESSION[ 'flash' ][ 'notice' ] = "Country successfuly deleted!";
        }
        
        Route::redirectTo("countries");
        
    }
    
    /**
     * 
     * @param array $params
     */
    function search ($params) {
        
        $countries = Country::search($params['key'], $params['value']);
        
        if($countries->count() > 0) {
            
            if($this->isAjax()) {
                $this->renderView("countries", "_countries", 'none', "Listing Countries", $countries);
            } else {
                $this->renderView("countries", $this->defaultView, $this->layout, "Listing Countries", $countries);
            }
            
        } else {
            
            $_SESSION[ 'flash' ][ 'error' ] = "No countries found.";
            
        }
        
    }

    /**
     * Show info about specific Country
     * @param array $params
     */
    public function show($params) {
        
        $countries = Country::show($params['id']);
        
        if(isset($params['format']) && $params['format'] != "html" ) {
            $this->renderView("countries", "index", 'none', "Listing Countries", $countries, $params);
        } else {
            $this->renderView("countries", "show", $this->layout, "Show Country", $countries);
        }
        
    }

}