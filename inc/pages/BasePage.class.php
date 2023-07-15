<?php

class BasePage {
    static $pageTitle = "";
    
    static function _header() {
        ?>
        <!-- Start the page 'header' -->
        <!DOCTYPE html>
        <html>
            <head>
                <title></title>
                <base href="<?= BASE_URL;?>">
                <meta charset="utf-8">
                <meta name="author" content="<?= AUTHOR ?>">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title><?= self::$pageTitle ?></title>   
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
                <link href="css/style.css" rel="stylesheet">
            </head>
        <?php
    }
    static function _footer() {
        ?>
        </html>
        <?php
    }
    static function _logo() {
        ?>
        <h1><a href="<?php echo SimpleRoute::getBaseURL(); ?>">Logo</a></h1>
        <?php
    }
    
    static function _menuBar() {
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
        else  
            $url = "http://";   
        // Append the host(domain name, ip) to the URL.   
        $url.= $_SERVER['HTTP_HOST'];   
        
        // Append the requested resource location to the URL   
        $url.= $_SERVER['REQUEST_URI']; 
        ?>
        <nav id="list" class="navbar navbar-expand-lg navbar-light">
            <div>
                <ul class="navbar-nav mr-auto">
            </div>
            <ul class="navbar-nav mr-auto">
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) { ?>
                        <li class="nav-item"> 
                        <form action="<?php echo SimpleRoute::getBaseURL() . "/logout" ?>" method="POST">
                            <input type="submit" class="nav-link" name="logout" value="Logout" >
                        </form>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                        <a class="nav-link" href="<?php echo SimpleRoute::getBaseURL() . "/login"; ?>">Login</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="<?php echo SimpleRoute::getBaseURL() . "/join"; ?>">Create account</a>
                        </li>
                    <?php } ?>
            </ul>
            <!-- <a href="?page=login">Login</a>
            <a href="?page=join">Create account</a> -->
        </nav>
        <?php
    }

}

?>