<?php
require_once('inc/config.inc.php');

class SimpleRoute{
    private static $baseURL;
    private static $route = [];

    static function init($baseURL){
        self::$baseURL = $baseURL;
    }

    static function getBaseURL(): string{
        return self::$baseURL;
    }

    // function for routing
    static function getRoute(){
        $rawUrl = $_SERVER['REQUEST_URI'];
        $url_suffix = str_replace(BASE_FOLDER, "", $rawUrl);
        $uri_components = array_values(array_diff(explode("/", $url_suffix), [""] ));
        // URL => http://localhost/csis3280_week10/index.php?action=delete&id=10
        // simplified URL  http://localhost/csis3280_week10/index/delete/10
        // the first component will be the localhost
        // the second will be the folder, third is the controller
        // we want to get the fourth and fifth
        $page = '';
        $id = '';
        if(count($uri_components) >= 2){
            $page = $uri_components[1];

            if(count($uri_components) >= 3){
                $id = $uri_components[2];
            }
        }

        $method = $_SERVER['REQUEST_METHOD'];

        return self::$route = array(
            'method' => $method,
            'page' => $page,
            'id' => $id
        );
    }
}


?>