<?php

class BasePage
{
    static $pageTitle = "";

    static function _header()
    {
?>
        <!-- Start the page 'header' -->
        <!DOCTYPE html>
        <html>

        <head>
            <title></title>
            <base href="<?= BASE_URL; ?>">
            <meta charset="utf-8">
            <meta name="author" content="<?= AUTHOR ?>">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title><?= self::$pageTitle ?></title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
            <link href="css/style.css" rel="stylesheet">
            <link rel="shortcut icon" href="favicon.ico">
        </head>
    <?php
    }
    static function _footer()
    {
    ?>

        </html>
    <?php
    }
    static function _logo()
    {
    ?>
        <h1 ><a style="text-decoration: none; color: inherit;" href="<?php echo SimpleRoute::getBaseURL(); ?>"><?= PROJECT_NAME?></a></h1>
    <?php
    }

    static function _menuBar()
    {
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
            $url = "https://";
        else
            $url = "http://";
        // Append the host(domain name, ip) to the URL.   
        $url .= $_SERVER['HTTP_HOST'];

        // Append the requested resource location to the URL   
        $url .= $_SERVER['REQUEST_URI'];
    ?>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbarText">
            
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) { ?>
                    <span class="navbar-text" style="color: white;">Hi, <?= $_SESSION['user'] ?></span>
                    <a class="nav-link" href="<?php echo SimpleRoute::getBaseURL() . "/changepassword" ?>"> <button class="btn btn-dark">Change Password</button></a>
                    <a class="nav-link"><form class="form-inline" action="<?php echo SimpleRoute::getBaseURL() . "/logout" ?>" method="POST">
                        <input type="submit" class="btn btn-dark" name="logout" value="Logout">
                    </form></a>
                <?php } else { ?>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo SimpleRoute::getBaseURL() . "/login"; ?>">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo SimpleRoute::getBaseURL() . "/join"; ?>">Create account</a>
                        </li>
                        
                    </ul>
                <?php } ?>
                
            </div>
            <form action="<?php echo SimpleRoute::getBaseURL() . "/search" ?>" method="GET">
                <input style="display: inline;" type="text" id="search" class="search" placeholder="Search movies..." name="movieNameString" />
                <a style="display: inline;" class="nav-link" href="<?php echo SimpleRoute::getBaseURL() . "/changepassword" ?>">
                    <button class="btn btn-dark">Search</button>
                </a>
            </form>
            
            <!-- <a href="?page=login">Login</a>
            <a href="?page=join">Create account</a> -->
        </nav>
<?php
    }
}

?>