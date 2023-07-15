<?php
require_once('components/MovieCard.class.php');
require_once('inc/config.inc.php');

class HomePage extends BasePage {
    
    static function _body($movies) {
        ?>
        <body>
        <header>
            <?= self::_logo(); ?>
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
        self::_header();
        self::_body($movies);
        self::_footer();
    }
}

?>