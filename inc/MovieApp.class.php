<?php
require_once('utilities/ReviewDAO.class.php');
require_once('entities/Review.class.php');
require_once('utilities/LoginProcessor.class.php');
require_once('getCurrUrl.php');

class MovieApp {
    static function _handlePostReview() {
        error_log(
            "{$_POST['userId']}, {$_POST['movieId']}, {$_POST['content']}, {$_POST['rating']}"
        );
        return ReviewDAO::insertReview($_POST['userId'], $_POST['movieId'], $_POST['content'] ,$_POST['rating']);
    }
    static function _validateReview () {
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
    static function run($id, $method = "GET") {
        $contentValidation = "default";
        $ratingValidation = "default";

        if (isset($_POST['logout'])) {
            LoginProcessor::logout();
        }
        MovieDAO::initialize('Movie');
        ReviewDAO::initialize('Review');
        $movies = MovieDAO::getMovie($id);
        // post review
        if ($method == "POST")
        {
            $validation = self::_validateReview();
            $contentValidation = $validation['hasContent'];
            $ratingValidation = $validation['hasRating'];
            if ($contentValidation == "pass" && $ratingValidation == "pass")
                echo self::_handlePostReview();
        }
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