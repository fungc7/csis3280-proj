<?php
require_once('utilities/ReviewDAO.class.php');
require_once('entities/Review.class.php');

class MovieApp {
    static function handlePostReview() {
        
    }


    static function run() {
        MovieDAO::initialize('Movie');
        ReviewDAO::initialize('Review');
        $movies = MovieDAO::getMovie($_GET['movie']);
        if (count($movies) > 0) {
            $targetMovie = $movies[0];
            $review = ReviewDAO::getMovieReview($targetMovie->getMovieId());
            // print_r($review);
            MoviePage::show($targetMovie, $review);
        }
        else {
            NotFoundPage::show();
        }
    }
}

?>