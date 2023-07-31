<?php
/*
Default 404 Not Found page
*/

class NotFoundPage extends BasePage {
    static function _body() {
        ?>
        <body>
        <h1>404 Not Found: Page does not exist.</h1>
        </body>
        <?php
    }
    static function show() {
        self:: _header();
        self::_body();
        self::_footer();
    }
}

?>