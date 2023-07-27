<?php
require_once('utilities/MovieDAO.class.php');
require_once('entities/Movie.class.php');
require_once('utilities/LoginProcessor.class.php');
require_once('getCurrUrl.php');

class HomePageApp {
    static function run() {

        MovieDAO::initialize('Movie');
        if (isset($_POST['logout'])) {
            LoginProcessor::logout();
        }
        $movies = MovieDAO::getHomePageMovies();
        HomePage::show($movies);
    }
}

?>
