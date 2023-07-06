<?php

class MoviePage {
    private static $IMAGE_URL_PREFIX = IMAGE_URL;
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
                    <h1><a href="?page=home">Logo</a></h1>
                </header>
        <?php
    }
    static function _footer() {
        ?>
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
    static function _body($movie) {
        ?>
            <div>
                <img src="<?php echo self::$IMAGE_URL_PREFIX . $movie->getBackdropUrl(); ?>" alt="<?php echo $movie->getTitle(); ?>">
                <h3>Overview</h3>
                <p><?php echo $movie->getOverview(); ?></p>
            </div>
            <div class="reviews">
                <div>
                    <h4>Username</h4>  
                    <p>Review Text</p>
                </div>
                <div class="form-container">
                    <form action="" method="post">
                        <textarea name="movie-review" id="movie-review" cols="30" rows="10"></textarea>
                        <input type="hidden" name="action" value="post-review">
                        <input type="submit" name="submit" value="Submit"/>
                    </form>
                </div>
            </div>
        <?php
    }
    static function show($movie) {
        self::_header();
        self::_menuBar();
        self::_body($movie);
        self::_footer();
    }
}

?>
