<?php
require_once('utilities/MovieDAO.class.php');
require_once('entities/Movie.class.php');

class SearchMovieApp {
    static function run() {
        $movieNameStr = $_GET['movieNameString'];

        MovieDAO::initialize("Movie");

        $searchRes = MovieDAO::searchMovieByName($movieNameStr);
        
        HomePage::show($searchRes);
    }
}

?>