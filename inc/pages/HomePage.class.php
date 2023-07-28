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
        <?= self::_menuBar() ?>
        <div class="container">
            <?php
                foreach($movies as $mov)
                    $mov->getMovieCard()->render();
            ?>
            <?php if (count($movies) == 0 ) { ?>
                <p>No movies found.</p>
            <?php } ?>
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