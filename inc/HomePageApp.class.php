<?php
require_once('utilities/MovieDAO.class.php');
require_once('entities/Movie.class.php');

class HomePageApp {
    static function run() {
        MovieDAO::initialize('Movie');
        $movies = MovieDAO::getHomePageMovies();
        HomePage::show($movies);
    }
}

?>
