<?php
require_once('components/MovieCard.class.php');
require_once('inc/config.inc.php');

class HomePage {
    static $siteHeader = "My Movie Site";
    static function _header() {
        ?>
        <!-- Start the page 'header' -->
        <!DOCTYPE html>
        <html>
            <head>
                <title></title>
                <meta charset="utf-8">
                <meta name="author" content="Bambang">
                <title>Assignment 3 Bambang</title>   
                <link href="css/style.css" rel="stylesheet">
            </head>
            <body>
                <header>
                    <h1><?= self::$siteHeader; ?></h1>
                </header>
                <article>
                <?php
            }
    static function _footer() {
        ?>
            <!-- Start the page's footer -->            
            </article>
            </body>
        </html>
        <?php
    }
    static function _menuBar() {
        ?>
        <table id="list" class="menu-bar">
            <thead>
                <tr>
                    <th><a href="?page=login">Login</a></th>
                    <th><a href="?page=join">Create account</a></th>
                </tr>
            </thead>
        </table>
        <?php
    }
    static function _body($cards) {
        ?>
        <!-- Start the page's show data form -->
        <div class="main">
        <?= self::_menuBar() ?>
        </div> 
        <div class="movies container">
            <?php
                foreach($cards as $card)
                    $card->render();
            ?>
        </div>
        <?php
    }
    static function show($movieCards) {
        self::_header();
        self::_body($movieCards);
        self::_footer();
    }
}

?>