<?php

class Route {
    
    const ROOT_PATH = "index.php";
    
    const CONFIG_PATH = "config/";
    
    const APP_PATH = "app/";

    const MODELS_PATH = "app/models/";

    const VIEWS_PATH = "app/views/";
    
    const CONTROLLERS_PATH = "app/controllers/";
    
    const HELPERS_PATH = "app/helpers/";

    public static function getControllerPath($controller) {
        return self::CONTROLLERS_PATH.$controller."_controller.php";
    }
    
    public static function getViewsPath($controller, $view) {
        return self::VIEWS_PATH.$controller."/".$view.".php";
    }
    
    public static function getModelPath($model) {
        return self::MODELS_PATH.$model.".php";
    }
    
    public static function getHelperPath($helper) {
        return self::HELPERS_PATH.$helper."_helper.php";
    }
    
}

?>
