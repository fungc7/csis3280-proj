<?php
/*
Default 404 Not Found page
*/

class NotFoundPage {
    static function _header(){
        ?>
        <!-- Start the page 'header' -->
        <!DOCTYPE html>
            <head>
            <title>PHP Project</title>
            <meta charset="utf-8">
            <meta name="author" content="Bambang">
            <link href="style.css" rel="stylesheet">     
            </head>
            <body>
        <?php
    }
    static function _footer() {
        ?>
            </body>
        </html>
    <?php
    }
    static function _body() {
        ?>
        <h1>404 Not Found: Page does not exist.</h1>
        <?php
    }
    static function show() {
        self:: _header();
        self::_body();
        self::_footer();
    }
}

?>