<?php

class MovieApp {
    static function handlePostReview() {
        
    }


    static function run() {
        MovieDAO::initialize('Movie');
        $movies = MovieDAO::getMovie($_GET['movie']);
        if (count($movies) > 0) {
            MoviePage::show($movies[0]);
        }
        else {
            NotFoundPage::show();
        }
    }
}

?>