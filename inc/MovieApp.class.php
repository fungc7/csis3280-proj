<?php
require_once('utilities/ReviewDAO.class.php');
require_once('entities/Review.class.php');
require_once('utilities/LoginProcessor.class.php');
require_once('getCurrUrl.php');

class MovieApp {
    static function handlePostReview() {
        print_r(
            [$_POST['userId'], $_POST['movieId'], $_POST['content'] ,$_POST['rating']]
        );
        return ReviewDAO::insertReview($_POST['userId'], $_POST['movieId'], $_POST['content'] ,$_POST['rating']);
    }
    static function validateReview () {
        $validation = ["hasContent" => "default", "hasRating" => "default"];
        if (strlen($_POST['content']) > 0)
            $validateContent = "pass";
        else 
            $validateContent = "fail";
        if ($_POST['rating'] != "default")
            $validateRating = "pass";
        else
            $validateRating = "fail";
        $validation['hasContent'] = $validateContent;
        $validation['hasRating'] = $validateRating;
        return $validation;
    }
    static function run() {
        $url =  getCurrUrl();
        $contentValidation = "default";
        $ratingValidation = "default";
        $_SESSION['lastPage'] = $url;

        if (isset($_POST['logout'])) {
            LoginProcessor::logout();
        }
        MovieDAO::initialize('Movie');
        ReviewDAO::initialize('Review');
        $movies = MovieDAO::getMovie($_GET['movie']);
        // post review
        if (isset($_POST['action']) && $_POST['action'] == 'post-review')
        {
            $validation = self::validateReview();
            $contentValidation = $validation['hasContent'];
            $ratingValidation = $validation['hasRating'];
            if ($contentValidation == "pass" && $ratingValidation == "pass")
                echo self::handlePostReview();
        }
        echo $contentValidation . " " . $ratingValidation . " ";
        // display page
        if (count($movies) > 0) {
            $targetMovie = $movies[0];
            $review = ReviewDAO::getMovieReview($targetMovie->getMovieId());
            // print_r($review);
            MoviePage::show($targetMovie, $review, $contentValidation, $ratingValidation);
        }
        else {
            NotFoundPage::show();
        }
    }
}

?>