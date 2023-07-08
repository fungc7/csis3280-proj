<?php
require_once('components/ReviewCard.class.php');
require_once('inc/config.inc.php');

class MoviePage extends BasePage{
    private static $IMAGE_URL_PREFIX = IMAGE_URL;

    static function _menuBar() {
        ?>
        <body>
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
        </body>
        <?php
    }
    static function _body($movie, $review) {
        ?>
        <body>
                <header>
                    <h1><a href="?page=home">Logo</a></h1>
                </header>
                <?= self::_menuBar() ?>
            <div class="card mb-3">
                <img class="card-img-top" src="<?php echo self::$IMAGE_URL_PREFIX . $movie->getBackdropUrl(); ?>" alt="<?php echo $movie->getTitle(); ?>">
                <h4 class="card-title">Overview</h4>
                <p class="card-text"><?php echo $movie->getOverview(); ?></p>
            </div>
            <div class="reviews">
                <?php
                    foreach($review as $re)
                        $re->getReviewCard()->render();
                ?>
                <!-- <div class="card">
                    <h6 class="font-weight-bold">Username</h6> 
                    <div class="movie-info">
                        <p class="font-weight-normal"> Review Text</p>
                        <span class="orange">6.6</span>
                    </div> 
                    <footer class="font-weight-light">2020-11-11</footer>
                </div> -->
                <div class="form-group">
                    <form action="" method="post">
                        <textarea class="form-control" name="movie-review" id="movie-review" rows="3"></textarea>
                        <input type="hidden" name="action" value="post-review">
                        <input type="submit" class="btn btn-dark" name="submit" value="Submit"/>
                    </form>
                </div>
            </div>
        </body>
        <?php
    }
    static function show($movie, $review) {
        self::_header();
        self::_body($movie, $review);
        self::_footer();
    }
}

?>
