<?php
require_once('inc/config.inc.php');
/*
Reference to Week 10 demo - SimpleRoute.class.php
*/
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
        $url_suffix = explode("?", $url_suffix)[0];
        $uri_components = array_values(array_diff(explode("/", $url_suffix), [""] ));

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