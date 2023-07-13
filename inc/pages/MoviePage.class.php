<?php
require_once('components/ReviewCard.class.php');
require_once('inc/config.inc.php');

class MoviePage extends BasePage{
    private static $IMAGE_URL_PREFIX = IMAGE_URL;
    
    static function _body($movie, $review, $contentValidation, $ratingValidation) {
        $loggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'];
        ?>
        <body>
                <header>
                    <h1><a href="?page=home">Logo</a></h1>
                </header>
                <?php echo self::_menuBar() ?>
            <div class="card mb-3">
                <img class="card-img-top" src="<?php echo self::$IMAGE_URL_PREFIX . $movie->getBackdropUrl(); ?>" alt="<?php echo $movie->getTitle(); ?>">
                <h4 class="card-title">Overview</h4>
                <p class="card-text"><?php echo $movie->getOverview(); ?></p>
            </div>
            <div class="reviews">
                <h4 class="card-title">Reviews</h4>
                <?php if (!$loggedIn) { ?>
                <div>
                    <p> <a href="?page=login">Login</a> to write a review! </p>
                </div>
                <?php } ?>
                <?php
                    foreach($review as $re)
                        $re->getReviewCard()->render();
                ?>
                <?php if ($loggedIn) { ?>
                <h4 class="card-title">Write Your Review !</h4>
                <div class="form-group">
                    <form action="" method="post">
                        <textarea class="form-control" name="content" id="reviewcontent" rows="3"></textarea>
                        <?php
                        if ($contentValidation == "fail")
                            echo '<div class="alert alert-danger w-25">Please write your review.</div>';
                        ?>
                        <select class="custom-select w-25" name="rating">
                            <option value="default" selected>Rating 1-10</option>
                            <?php
                                for ($i = 1; $i <= 10; $i++)
                                    echo "<option value=\"{$i}\" style=\"color:black;\">{$i}</option>";
                            ?>
                        </select><br>
                        <?php
                        if ($ratingValidation == "fail")
                        echo '<div class="alert alert-danger w-25">Please give your rating.</div>';
                        ?>
                        <input type="hidden" name="userId" value=
                            <?php 
                            if (isset($_SESSION['userid']))
                                echo "\"" . $_SESSION['userid'] . "\"";
                            ?>
                        >
                        <input type="hidden" name="movieId" value="<?php echo $movie->getMovieId(); ?>" />
                        <input type="hidden" name="action" value="post-review">
                        <input type="submit" class="btn btn-dark" name="submit" value="Submit"/>
                    </form>
                </div>
                <?php } ?>
            </div>
        </body>
        <?php
    }
    static function show($movie, $review, $contentValidation, $ratingValidation) {
        self::_header();
        self::_body($movie, $review, $contentValidation, $ratingValidation);
        self::_footer();
    }
}

?>
