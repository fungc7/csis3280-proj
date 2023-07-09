<?php

function getCurrUrl() {
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
    {
        $url = "https://";
    } else
    {
        $url = "http://";
    }
    $url .= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];   
    return $url;
}
