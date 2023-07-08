<?php
require_once('components/MovieCard.class.php');
require_once('inc/config.inc.php');

class HomePage extends BasePage {
    static $siteHeader = "My Movie Site";
    static function _menuBar() {
        ?>
        <nav id="list" class="navbar navbar-expand-lg navbar-light">
            <div>
                <ul class="navbar-nav mr-auto">
            </div>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="?page=login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=join">Create account</a>
                </li>
            </ul>
            <!-- <a href="?page=login">Login</a>
            <a href="?page=join">Create account</a> -->
        </nav>
        <?php
    }
    static function _body($movies) {
        ?>
        <body>
        <header>
            <h1><?= self::$siteHeader; ?></h1>
        </header>
        <!-- Start the page's show data form -->
        <?= self::_menuBar() ?>
        <div class="container">
            <?php
                foreach($movies as $mov)
                    $mov->getMovieCard()->render();
            ?>
        </div>
        </body>
        <?php
    }
    static function show($movies) {
        self::$pageTitle = "CSIS3280 Project";
        self::_header();
        self::_body($movies);
        self::_footer();
    }
}

?>